<?php

declare(strict_types=1);

namespace Src\Controllers\Admin;

use Src\Views\View;
use Src\Controllers\AbstractController;
use Src\Models\Admin\DashboardAdminModel;

class DashboardAdminController extends AbstractController
{
    public function DashboardAdminView(): Void
    {
        $this->adminDashboard();

        if (isset($_SESSION['status']) && $_SESSION['status'] === "login") {
            $dashboardAdminModel = new DashboardAdminModel($this->configuration);

            $arrayUsers = $dashboardAdminModel->showOperators();

            $this->paramView['operators'] = $this->foramtDaty($arrayUsers);

            (new View())->renderAdmin("dashboardAdmin", $this->paramView, "admin");
        } else {
            $this->redirect("/access-denied");
        }
    }

    private function foramtDaty(array $arrayItem): array
    {
        foreach ($arrayItem as &$item) {
            if (isset($item['last_login']) && !empty($item['last_login'])) {
                $date = new \DateTime($item['last_login']);
                $item['last_login'] = $date->format('d-m-Y H:i');
            }
        }
        return $arrayItem;
    }

    public function PwdUnlock(): void
    {
        $dashboardAdminMod = new DashboardAdminModel($this->configuration);
        $data = [
            'pwdUnlock' => $this->request->postParam('pwd_unlock'),
            'pwdChange' => $this->request->postParam('pwd_change'),
            'pwd' => trim($this->request->postParam('pwd')),
            'pwdRepeat' => trim($this->request->postParam('pwd_repeat')),
            'id' => $this->request->postParam('id')
        ];

        if (!empty($data['pwdUnlock']) && $data['pwdUnlock'] === "on") {
            if ($dashboardAdminMod->accountUnloc("active", (int) $data['id'])) {
                flash("pwdUnlock", "Konto zostało odblokowane", "alert-login alert-login--confirm");
            } else {
                flash("pwdUnlock", "Coś poszło nie tak", "alert-login alert-login--error");
                $this->redirect("/admin-dashboard");
            }
        }

        if (!empty($data['pwdChange']) && $data['pwdChange'] === "on") {

            if ($this->ValidPwd($data['pwd'], $data['pwdRepeat'])) {
                flash("pwdUnlock", "Niepoprawne hasła", "alert-login alert-login--error");
                $this->redirect("/admin-dashboard");
            } else {
                $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

                if ($dashboardAdminMod->pwdChange($data['pwd'], (int) $data['id'])) {
                    flash("pwdUnlock", "Hasło zostało zmienione", "alert-login alert-login--confirm");
                } else {
                    flash("pwdUnlock", "Coś poszło nie tak", "alert-login alert-login--error");
                    $this->redirect("/admin-dashboard");
                }
            }
        }

        if (empty($data['pwdUnlock']) || empty($data['pwdChange']) || empty($data['pwd']) || empty($data['pwdRepeat'])) {
            flash("pwdUnlock", "Nie uzupełniono odpowiednich formularzy", "alert-login alert-login--error");
            $this->redirect("/admin-dashboard");
        }

        $this->redirect("/admin-dashboard");
    }
}
