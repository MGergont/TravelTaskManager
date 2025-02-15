<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\User;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\FleetModel;
use Src\Models\Operator\DashboardUserModel;

class FleetUserController extends AbstractController
{

    public function fleetUserView(): Void
    {
        $this->userDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $fleetManagerMod = new FleetModel($this->configuration);

            $this->paramView['fleet'] = $this->formatDaty($fleetManagerMod->showUserFleet($_SESSION['userId']));

            if ($fleetManagerMod->showUserCarCosts($this->paramView['fleet']['id_car'])) {

                $this->paramView['costs'] = $this->formatDatyCosts($fleetManagerMod->showUserCarCosts($this->paramView['fleet']['id_car']));
            }

            (new View())->renderOperator("fleetUser", $this->paramView, "user");
        } else {
            $this->redirect("/access-denied");
        }
    }

    public function costsFleetAdd(): void
    {
        $fleetManagerMod = new FleetModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
            'expenseDate' => $this->request->postParam('add_expense_date'),
            'category' => $this->request->postParam('edit_category'),
            'amount' => $this->request->postParam('add_amount'),
            'description' => $this->request->postParam('add_description')
        ];

        if (empty($data['expenseDate'])  || empty($data['category']) || empty($data['amount']) || empty($data['description']) || empty($data['id'])) {
            flash("fleetUseManager", "Wymagany fomularz nie jest uzupełniony", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }

        if ($this->IfMaxLength($data, 30)) {
            flash("fleetUseManager", "Nieprawidłowa długość znaków", "alert alert--error");
            $this->redirect("/manager/vehicle");
        };

        //TODO bez znaków specjalnych
        if ($this->IfSpecialCharacters($data['description'])) {
            flash("fleetUseManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }

        switch ($data['category']) {
            case 'service':
                $data['category'] = "service";
                break;
            case 'fuel':
                $data['category'] = "fuel";
                break;
            case 'exploitation':
                $data['category'] = "exploitation";
                break;
            default:
                flash("fleetUseManager", "Niepoprawny formularz", "alert alert--error");
                $this->redirect("/manager/vehicle");
                break;
        }

        if ($this->ValidFloatingNumbers($data['amount'])) {
            flash("fleetUseManager", "Niepoprawne znaki w nazwie ulicy", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }

        if ($fleetManagerMod->addCost($data)) {
            flash("fleetUseManager", "Konto zostało zmodyfikowane", "alert alert--confirm");
            $this->redirect("/manager/vehicle");
        } else {
            flash("fleetUseManager", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }
    }

    public function costsFleetEdit(): void
    {
        $fleetManagerMod = new FleetModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id'),
            'expenseDate' => $this->request->postParam('edit_expense_date'),
            'category' => $this->request->postParam('edit_category'),
            'amount' => $this->request->postParam('edit_amount'),
            'description' => $this->request->postParam('edit_description')
        ];

        if (empty($data['expenseDate'])  || empty($data['category']) || empty($data['amount']) || empty($data['description']) || empty($data['id'])) {
            flash("fleetUseManager", "Wymagany fomularz nie jest uzupełniony", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }

        if ($this->IfMaxLength($data, 30)) {
            flash("fleetUseManager", "Nieprawidłowa długość znaków", "alert alert--error");
            $this->redirect("/manager/vehicle");
        };

        //TODO bez znaków specjalnych
        if ($this->IfSpecialCharacters($data['description'])) {
            flash("fleetUseManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }

        switch ($data['category']) {
            case 'service':
                $data['category'] = "service";
                break;
            case 'fuel':
                $data['category'] = "fuel";
                break;
            case 'exploitation':
                $data['category'] = "exploitation";
                break;
            default:
                flash("fleetUseManager", "Niepoprawny formularz", "alert alert--error");
                $this->redirect("/manager/vehicle");
                break;
        }

        if ($this->ValidFloatingNumbers($data['amount'])) {
            flash("fleetUseManager", "Niepoprawne znaki w nazwie ulicy", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }

        if ($fleetManagerMod->editCost($data)) {
            flash("fleetUseManager", "Konto zostało zmodyfikowane", "alert alert--confirm");
            $this->redirect("/manager/vehicle");
        } else {
            flash("fleetUseManager", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }
    }

    public function costDel(): void
    {
        $fleetManagerMod = new FleetModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id')
        ];

        if ($fleetManagerMod->dellCost((int) $data['id'])) {
            flash("fleetUseManager", "Koszt został usunięty", "alert alert--confirm");
            $this->redirect("/manager/vehicle");
        } else {
            flash("fleetUseManager", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/vehicle");
        }
    }

    private function formatDaty(array $item): array
    {
        // Definiujemy pola do formatowania i ich odpowiedni format
        $dateFields = [
            'production_year' => 'Y',  // Tylko rok
            'last_service' => 'Y-m-d', // Tylko data
            'end_of_insurance' => 'Y-m-d', // Tylko data
            'end_of_tech_inspect' => 'Y-m-d' // Tylko data
        ];

        foreach ($dateFields as $field => $format) {
            if (isset($item[$field]) && !empty($item[$field])) {
                try {
                    $date = new \DateTime($item[$field]);
                    $item[$field] = $date->format($format);
                } catch (\Exception $e) {
                    $item[$field] = ''; // Jeśli błąd, ustaw pustą wartość
                }
            }
        }

        return $item;
    }

    private function formatDatyCosts(array $arrayItems): array
    {
        // Definiujemy pola do formatowania i ich odpowiedni format
        $dateFields = [
            'expense_date' => 'Y-m-d'
        ];

        foreach ($arrayItems as &$item) {
            foreach ($dateFields as $field => $format) {
                if (isset($item[$field]) && !empty($item[$field])) {
                    try {
                        $date = new \DateTime($item[$field]);
                        $item[$field] = $date->format($format);
                    } catch (\Exception $e) {
                        // Obsługa błędów parsowania daty
                        $item[$field] = 'Niepoprawna data';
                    }
                }
            }
        }
        return $arrayItems;
    }
}
