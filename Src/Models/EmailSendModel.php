<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Models\AbstractModel;

class EmailSendModel extends AbstractModel{
    
    public function getEndInsurance(): Bool|Array{
        $interval = 14;

        $this->query('SELECT 
            cc.id_car,
            cc.license_plate,
            cc.brand,
            cc.model,
            cc.production_year,
            cc.mileage,
            cc.status,
            cc.end_of_insurance FROM public.company_cars cc WHERE cc.end_of_insurance <= CURRENT_DATE + INTERVAL \'' . $interval . ' days\' AND cc.end_of_insurance >= CURRENT_DATE;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function getEndTechInspect(): Bool|Array{
        $interval = 14;

        $this->query('SELECT 
            cc.id_car,
            cc.license_plate,
            cc.brand,
            cc.model,
            cc.production_year,
            cc.mileage,
            cc.status,
            cc.end_of_tech_inspect FROM public.company_cars cc WHERE cc.end_of_tech_inspect <= CURRENT_DATE + INTERVAL \'' . $interval . ' days\' AND cc.end_of_insurance >= CURRENT_DATE;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

        public function emailLogIn($to, $subject, $body, $ststus, $errror): Bool{
            $this->query('INSERT INTO public.sent_emails(recipient_email, recipient_name, subject, body, status) VALUES (:to, :to, :subject, :body, :ststus);');
            
            $this->bind(':to', $to);
            $this->bind(':subject', $subject);
            $this->bind(':body', "Template" . $body . "###" . $errror);
            $this->bind(':ststus', $ststus);
            
            if($this->execute()){
                return true;
            }else{
                return false;
            }

    }
}