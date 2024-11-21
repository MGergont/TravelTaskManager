<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class RoutsOrderModel extends AbstractModel{
    
    public function showOrders() : Array|Bool{
        $this->query('SELECT
			orders.id_order,
            orders.order_name,
            orders.status_order,
            orders.created_at,
			orders.due_date,
            ls1.location_name AS origin_location,
            ls2.location_name AS destination_location,
			ls1.city AS origin_city,
            ls2.city AS destination_city,
			ls1.zip_code AS origin_zip_code,
            ls2.zip_code AS destination_zip_code,
			ls1.town AS origin_town,
            ls2.town AS destination_town,
			ls1.street AS origin_street,
            ls2.street AS destination_street,
			ls1.house_number AS origin_house_number,
            ls2.house_number AS destination_house_number
        FROM orders
        JOIN routes ON orders.id_order = routes.id_order_fk
        JOIN locations ls1 ON routes.id_origin_location = ls1.id_location
        JOIN locations ls2 ON routes.id_destination_location = ls2.id_location
        ORDER BY orders.id_order;');
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showOperator() : Array|Bool{
        $this->query('SELECT id_operator, login, name, last_name FROM public.operator;');
    
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