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

    public function locationDell(int $idLocation) : Bool {
        $this->query('DELETE FROM public.locations WHERE id_location = :idlocation');

        $this->bind(':idlocation', $idLocation);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function locationUpdate(array $data) : Bool {
        $this->query('UPDATE public.locations
	SET house_number=:houseNumber, street=:street, town=:town, zip_code=:zipCode, city=:city, latitude=:latitude, longitude=:longitude, location_name=:name
	WHERE id_location = :idlocation');

        $this->bind(':name', $data['name']);
        $this->bind(':houseNumber', $data['houseNumber']);
        $this->bind(':street', $data['street']);
        $this->bind(':town', $data['town']);
        $this->bind(':zipCode', $data['zipCode']);
        $this->bind(':city', $data['city']);
        $this->bind(':latitude', $data['latitude']);
        $this->bind(':longitude', $data['longitude']);
        $this->bind(':idlocation', $data['id']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}