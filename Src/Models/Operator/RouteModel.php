<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class RouteModel extends AbstractModel{
    public function getIdDel(int $id): Bool|Array{
        $this->query('SELECT MAX(id_travel) AS id_del FROM route WHERE id_operator_fk = :id;');
        $this->bind(':id', $id);

        $row = $this->singleArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }


    public function addTrip(array $data, int $id): Bool{
        $this->query('INSERT INTO route (location_1, location_2, id_travel, time_travel_out, time_travel_in, distance, id_operator_FK) VALUES (:StartRoute, :StopRoute, :id_del, :startTrip, :stopTrip, :Distance, :id);');
        
        $this->bind(':id_del', $data['id_del']);
        $this->bind(':StartRoute', $data['StartRoute']);
        $this->bind(':Distance', $data['Distance']);
        $this->bind(':StopRoute', $data['StopRoute']);
        $this->bind(':startTrip', $data['startTrip']);
        $this->bind(':stopTrip', $data['stopTrip']);
        $this->bind(':id', $id);
        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getLocation(int $id): Bool|Array{
        $this->query('SELECT DISTINCT location_1 FROM route WHERE id_operator_fk = :id;');
        $this->bind(':id', $id);

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    // public function addCost(array $data, int $id): Bool{

    //     $this->query('INSERT INTO costs VALUES (NULL, NOW(), :amount, :description, "route", NULL, :Idvehicle, :id);');
        
    //     $this->bind(':amount', $data['amount']);
    //     $this->bind(':description', $data['description']);
    //     $this->bind(':Idvehicle', $data['id']);
    //     $this->bind(':id', $id);
        
    //     if($this->execute()){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}