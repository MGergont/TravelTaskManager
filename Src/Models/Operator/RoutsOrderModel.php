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

    public function orderAdd(array $data): Bool|Array{

        $this->query('INSERT INTO public.orders(order_name, created_at, status_order, assigned_to, due_date) VALUES (:name, NOW(), :status, :user, :date) RETURNING id_order');
        
        $this->bind(':name', $data['nameOrder']);
        $this->bind(':user', $data['user']);
        $this->bind(':status', "new");
        $this->bind(':date', $data['date']);

        $row = $this->singleArray();
        
        if($this->rowCount() == 1){

            $row['id_route'] = $this->routesAdd($data, $row['id_order']);

            if($row['id_route']){
                return $row;
            }
        }else{
            return false;
        }
    }

    public function orderDell(int $idOrder) : Bool {
        $this->query('DELETE FROM public.routes WHERE id_route = :idorder');

        $this->bind(':idorder', $idOrder);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function routesAdd(array $data, int $id){

        $this->query('INSERT INTO public.routes(id_order_fk, id_origin_location,id_destination_location, departure_time, arrival_time) VALUES (:id_order, :locationA, :locationB, :dateDeparture, :dateArrival) RETURNING id_route');
        
        $this->bind(':id_order', $id);
        $this->bind(':locationA', $data['locationA']);
        $this->bind(':locationB', $data['locarionB']);
        $this->bind(':dateDeparture', $data['departureDateA']);
        $this->bind(':dateArrival', $data['arrivalDate']);

        $row = $this->singleArray();

        if($this->rowCount() == 1){
            return $row['id_route'];
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

    public function showAdress(int $id) : Array|Bool{
        $this->query('SELECT * FROM public.address WHERE id_operator_fk = :id;');
        
        $this->bind(':id', $id);

        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function locationAddAndReturn(array $data): Array|Bool{

        $this->query('INSERT INTO public.locations(house_number, street, town, zip_code, city, latitude, longitude, location_name) VALUES ( :houseNumber, :street, :town, :zipCode, :city, :latitude, :longitude, :name) RETURNING id_location');
        
        $this->bind(':name', $data['name']);
        $this->bind(':houseNumber', $data['house_number']);
        $this->bind(':street', $data['street']);
        $this->bind(':town', $data['town']);
        $this->bind(':zipCode', $data['zip_code']);
        $this->bind(':city', $data['city']);
        $this->bind(':latitude', $data['latitude']);
        $this->bind(':longitude', $data['longitude']);

        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showLocation(int $id, array $data) : Array|Bool{

        $name = "home adress " . $id;

        $this->query('SELECT * FROM public.locations WHERE location_name = :name AND city = :city AND zip_code = :zip_code AND town = :town AND street = :street AND house_number = :house_number');
        
        $this->bind(':city', $data['city']);
        $this->bind(':zip_code', $data['zip_code']);
        $this->bind(':town', $data['town']);
        $this->bind(':street', $data['street']);
        $this->bind(':house_number', $data['house_number']);
        $this->bind(':name', $name);
        
        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showLocationA(int $idOut) : Array|Bool{
       $id = $idOut;
        do {
            $this->query('SELECT id_location, location_name, city, zip_code, town, street, house_number FROM public.routes JOIN locations ON routes.id_destination_location = locations.id_location WHERE id_route = :idOrder');
            
            $this->bind(':idOrder', $id);
            
            $row = $this->singleArray();

            $id = $id - 1;

        } while ($this->rowCount() != 1);

        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showOrderList(int $id) : Array|Bool{
        $this->query('SELECT 
        id_route,
        ls1.location_name AS origin_location,
        ls1.city AS origin_city,
        ls1.street AS origin_street,
        ls1.house_number AS origin_house_number,
        ls2.location_name AS destination_location,
        ls2.city AS destination_city,
        ls2.street AS destination_street,
        ls2.house_number AS destination_house_number
        FROM public.routes
        JOIN locations ls1 ON routes.id_origin_location = ls1.id_location
        JOIN locations ls2 ON routes.id_destination_location = ls2.id_location
        WHERE id_order_fk = :idOrder ORDER BY id_route ASC');
        
        $this->bind(':idOrder', $id);
        
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}
