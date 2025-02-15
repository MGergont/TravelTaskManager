<?php

declare(strict_types=1);

namespace Src\Controllers;

use Src\Controllers\AbstractController;
use Src\Models\EmailSendModel;

class EmailSendController extends AbstractController
{

    public function EndInsurance(): string{
        $endInsurance = new EmailSendModel($this->configuration);

        $returnList = $endInsurance->getEndInsurance();

        if ($returnList) {
            foreach ($returnList as $key) {
    
                $dataEmail = [
                    "license" => $key['license_plate'],
                    "brand" => $key['brand'],
                    "model" => $key['model'],
                    "production_year" => date('Y', strtotime($key['production_year'])),
                    "end_of_insurance" => date('Y-m-d', strtotime($key['end_of_insurance'])),
                ];
                $this->sendEndInsurance('mateuszgergont06@gmail.com', $dataEmail);
            }
            return "Email send";
        }
        else{
            return "Insurance is OK";
        }
    }

    public function EndTechInspect(): string{
        $endInsurance = new EmailSendModel($this->configuration);

        $returnList = $endInsurance->getEndTechInspect();

        if ($returnList) {
            foreach ($returnList as $key) {
    
                $dataEmail = [
                    "license" => $key['license_plate'],
                    "brand" => $key['brand'],
                    "model" => $key['model'],
                    "production_year" => date('Y', strtotime($key['production_year'])),
                    "end_of_tech_inspect" => date('Y-m-d', strtotime($key['end_of_tech_inspect'])),
                ];
                $this->sendTechInspect('mateuszgergont06@gmail.com', $dataEmail);
            }
            return "Email send";
        }
        else{
            return "TechInspect is OK";
        }
    }
}
