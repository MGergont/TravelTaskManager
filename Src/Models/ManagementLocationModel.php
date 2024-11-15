<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Models\AbstractModel;

class ManagementLocationModel extends AbstractModel{
    
    public function showLocation() : Array|Bool{
        $this->query('SELECT * FROM public.locations ORDER BY id_location ASC');
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function locationAdd(array $data): Bool{

        $this->query('INSERT INTO public.locations(house_number, street, town, zip_code, city, latitude, longitude, location_name) VALUES ( :houseNumber, :street, :town, :zipCode, :city, :latitude, :longitude, :name)');
        
        $this->bind(':name', $data['name']);
        $this->bind(':houseNumber', $data['houseNumber']);
        $this->bind(':street', $data['street']);
        $this->bind(':town', $data['town']);
        $this->bind(':zipCode', $data['zipCode']);
        $this->bind(':city', $data['city']);
        $this->bind(':latitude', $data['latitude']);
        $this->bind(':longitude', $data['longitude']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accountDell(int $idOperator) : Bool {
        $this->query('DELETE FROM operator WHERE id_operator = :idoperator');

        $this->bind(':idoperator', $idOperator);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function accountUpdate(array $data) : Bool {
        $this->query('UPDATE public.operator SET login = :login, name = :name, last_name = :lastName, phone_number = :phoneNumber, email = :email, user_status = :status, user_grant = :privileges WHERE id_operator = :idoperator');

        $this->bind(':login', $data['login']);
        $this->bind(':name', $data['name']);
        $this->bind(':lastName', $data['lastName']);
        $this->bind(':phoneNumber', $data['phoneNumber']);
        $this->bind(':email', $data['email']);
        $this->bind(':privileges', $data['privileges']);
        $this->bind(':status', $data['status']);
        $this->bind(':idoperator', $data['id']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}