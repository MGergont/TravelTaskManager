<?php

declare(strict_types=1);

namespace Src\Controllers\Operator\Manager;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Operator\FleetModel;


class FleetManagerController extends AbstractController
{

    public function fleetManagerView(): Void
    {
        $this->managerDashboard();
        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $fleetManagerMod = new FleetModel($this->configuration);

            $this->paramView['fleet'] = $this->formatDaty($fleetManagerMod->showFleet());

            $this->paramView['users'] = $fleetManagerMod->showOperator();

            (new View())->renderOperator("fleetManager", $this->paramView, "manager");
        } else {
            $this->redirect("/access-denied");
        }
    }

    public function fleetAdd(): void
    {
        $fleetManagerMod = new FleetModel($this->configuration);
        $data = [
            'license' => $this->request->postParam('add_license'),
            'brand' => $this->request->postParam('add_brand'),
            'model' => $this->request->postParam('add_model'),
            'production' => $this->request->postParam('add_production_year'),
            'mileage' => $this->request->postParam('add_mileage'),
            'service' => $this->request->postParam('add_service'),
            'insurance' => $this->request->postParam('add_end_of_insurance'),
            'inspect' => $this->request->postParam('add_inspect')
        ];

        if (empty($data['license'])  || empty($data['brand']) || empty($data['model']) || empty($data['production']) || empty($data['mileage']) || empty($data['service']) || empty($data['insurance']) || empty($data['inspect'])) {
            flash("fleetManager", "Wymagany fomularz nie jest uzupełniony", "alert alert--error");
            $this->redirect("/manager/fleet");
        }

        if ($this->IfMaxLength($data, 30)) {
            flash("fleetManager", "Nieprawidłowa długość znaków", "alert alert--error");
            $this->redirect("/manager/fleet");
        };
        //TODO bez znaków specjalnych
        if ($this->IfSpecialCharacters($data['license'])) {
            flash("fleetManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
        if ($this->IfSpecialCharacters($data['brand'])) {
            flash("fleetManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
        if ($this->IfSpecialCharacters($data['model'])) {
            flash("fleetManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
        //TODO Walidacjaj numeru domu
        if ($this->ValidNumber($data['mileage'])) {
            flash("fleetManager", "Niepoprawny numer mieszkania", "alert alert--error");
            $this->redirect("/manager/fleet");
        }

        //TODO Walidacja tablic rejestracyjnych
        if ($this->ValidLicense($data['license'])) {
            flash("fleetManager", "Niepoprawny format tablic rejestracyjnych", "alert alert--error");
            $this->redirect("/manager/fleet");
        }

        if ($fleetManagerMod->addFleet($data, "free")) {
            flash("fleetManager", "Pojazd został dodany", "alert alert--confirm");
            $this->redirect("/manager/fleet");
        } else {
            flash("fleetManager", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
    }

    public function fleetEdit(): void
    {
        $fleetManagerMod = new FleetModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('edit_id'),
            'license' => $this->request->postParam('edit_license'),
            'brand' => $this->request->postParam('edit_brand'),
            'model' => $this->request->postParam('edit_model'),
            'production' => $this->request->postParam('edit_production_year'),
            'mileage' => $this->request->postParam('edit_mileage'),
            'service' => $this->request->postParam('edit_service'),
            'insurance' => $this->request->postParam('edit_end_of_insurance'),
            'inspect' => $this->request->postParam('edit_inspect'),
            'status' => $this->request->postParam('edit_status'),
            'id_oper' => $this->request->postParam('edit_oper')
        ];

        if (empty($data['license'])  || empty($data['brand']) || empty($data['model']) || empty($data['production']) || empty($data['mileage']) || empty($data['service']) || empty($data['insurance']) || empty($data['inspect']) || empty($data['id_oper']) || empty($data['id']) || empty($data['status'])) {
            flash("fleetManager", "Wymagany fomularz nie jest uzupełniony", "alert alert--error");
            $this->redirect("/manager/fleet");
        }

        switch ($data['status']) {
            case 'free':
                $data['status'] = "free";
                break;
            case 'in use':
                $data['status'] = "in use";
                break;
            case 'in servise':
                $data['status'] = "in servise";
                break;
            default:
                flash("fleetManager", "Niepoprawny formularz", "alert alert--error");
                $this->redirect("/manager/fleet");
                break;
        }

        if ($this->IfMaxLength($data, 30)) {
            flash("fleetManager", "Nieprawidłowa długość znaków", "alert alert--error");
            $this->redirect("/manager/fleet");
        };
        //TODO bez znaków specjalnych
        if ($this->IfSpecialCharacters($data['license'])) {
            flash("fleetManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
        if ($this->IfSpecialCharacters($data['brand'])) {
            flash("fleetManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
        if ($this->IfSpecialCharacters($data['model'])) {
            flash("fleetManager", "Niepoprawne znaki w danych wprowadzonych w formularzu", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
        //TODO Walidacjaj numeru domu
        if ($this->ValidNumber($data['mileage'])) {
            flash("fleetManager", "Niepoprawny numer mieszkania", "alert alert--error");
            $this->redirect("/manager/fleet");
        }

        //TODO Walidacja tablic rejestracyjnych
        if ($this->ValidLicense($data['license'])) {
            flash("fleetManager", "Niepoprawny format tablic rejestracyjnych", "alert alert--error");
            $this->redirect("/manager/fleet");
        }

        if ($fleetManagerMod->updateFleet($data)) {
            flash("fleetManager", "Pojazd został dodany", "alert alert--confirm");
            $this->redirect("/manager/fleet");
        } else {
            flash("fleetManager", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
    }

    public function fleetDel(): void
    {
        $fleetManagerMod = new FleetModel($this->configuration);
        $data = [
            'id' => $this->request->postParam('id')
        ];

        if ($fleetManagerMod->dellFeet((int) $data['id'])) {
            flash("fleetManager", "Pojazd został usunięty", "alert alert--confirm");
            $this->redirect("/manager/fleet");
        } else {
            flash("fleetManager", "Coś poszło nie tak", "alert alert--error");
            $this->redirect("/manager/fleet");
        }
    }

    private function formatDaty(array $arrayItems): array
    {
        // Definiujemy pola do formatowania i ich odpowiedni format
        $dateFields = [
            'production_year' => 'Y',  // Tylko rok
            'last_service' => 'Y-m-d', // Tylko data
            'end_of_insurance' => 'Y-m-d', // Tylko data
            'end_of_tech_inspect' => 'Y-m-d' // Tylko data
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
