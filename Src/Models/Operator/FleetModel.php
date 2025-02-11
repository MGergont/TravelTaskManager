<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class FleetModel extends AbstractModel{

    public function addFleet(array $data, string $status): Bool{
        $this->query('INSERT INTO public.company_cars (license_plate, brand, model, production_year, mileage, status, id_operator_fk, last_service, end_of_insurance, end_of_tech_inspect) VALUES (:license, :brand, :model, :production, :mileage, :status, NULL, :service, :insurance, :inspect);');
        
        $this->bind(':license', $data['license']);
        $this->bind(':brand', $data['brand']);
        $this->bind(':model', $data['model']);
        $this->bind(':production', $data['production']);
        $this->bind(':mileage', $data['mileage']);
        $this->bind(':service', $data['service']);
        $this->bind(':insurance', $data['insurance']);
        $this->bind(':inspect', $data['inspect']);
        $this->bind(':status', $status);
        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function showFleet() : Array|Bool{
        $this->query('SELECT
            cc.id_car,
            cc.license_plate,
            cc.brand,
            cc.model,
            cc.production_year,
            cc.mileage,
            cc.status,
            op.id_operator,
            cc.last_service,
            cc.end_of_insurance,
            cc.end_of_tech_inspect,
            op.name AS operator_name,
            op.last_name AS operator_last_name
        FROM public.company_cars cc
        LEFT JOIN public.operator op ON cc.id_operator_fk = op.id_operator;');
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

}