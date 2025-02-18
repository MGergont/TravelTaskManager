<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class DashboardUserModel extends AbstractModel{

    public function showOrdersOperator(int $user) : Array|Bool{
        $this->query('SELECT
			orders.id_order,
            routes.id_route,
            routes.departure_time,
			routes.arrival_time,
			routes.departure_time_active,
			routes.arrival_time_active,
            orders.order_name,
            orders.status_order,
			orders.due_date,
            orders.created_at,
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
        WHERE assigned_to = :userID AND orders.status_order = :status AND routes.arrival_time_active IS NULL ORDER BY routes.id_route ASC LIMIT 1');

        $this->bind(':userID', $user);
        $this->bind(':status', "in progress");

        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showActivePart(int $id) : Array|Bool{
        $this->query('SELECT departure_time_active, arrival_time_active FROM public.routes WHERE routes.id_route = :routeID');

        $this->bind(':routeID', $id);

        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function updateRouteDepartureTime(array $data): Bool{
        $this->query('UPDATE public.routes SET departure_time_active = NOW() WHERE id_route = :id;');
        
        $this->bind(':id', $data['id']);
        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateRouteArrivalTime(array $data): Bool{
        $this->query('UPDATE public.routes SET arrival_time_active = NOW() WHERE id_route = :id;');
        
        $this->bind(':id', $data['id']);
        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function orderUpdateStatus(int $id, string $status): Bool{
        $this->query('UPDATE public.orders SET status_order=:status WHERE id_order = :id;');
        
        $this->bind(':id', $id);
        $this->bind(':status', $status);
        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function showCar(int $id) : Array|Bool{
        $this->query('SELECT 
            cc.license_plate, 
            cc.brand, 
            cc.model, 
            cc.status, 
            cc.end_of_insurance, 
            cc.mileage FROM public.company_cars cc WHERE cc.id_operator_fk = :id;');

        $this->bind(':id', $id);

        $row = $this->singleArray();
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showCarCostSum(int $id) : Array|Bool{
        $interval = 30;
        $this->query('SELECT SUM(ce.amount) AS total_costs
            FROM public.car_expenses ce
            JOIN public.company_cars cc ON ce.id_car = cc.id_car
            WHERE cc.id_operator_fk = :id
            AND ce.expense_date >= CURRENT_DATE - INTERVAL \'' . $interval . ' days\';');

        $this->bind(':id', $id);

        $row = $this->singleArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showUserOrders(int $user) : Array|Bool{
        $this->query('SELECT
            orders.order_name,
			orders.due_date,
            ls1.location_name AS origin_location,
            ls2.location_name AS destination_location
        FROM orders
        JOIN routes ON orders.id_order = routes.id_order_fk
        JOIN locations ls1 ON routes.id_origin_location = ls1.id_location
        JOIN locations ls2 ON routes.id_destination_location = ls2.id_location
        WHERE assigned_to = :userID AND orders.due_date = (SELECT MIN(due_date) FROM public.orders WHERE assigned_to = :userID AND due_date >= CURRENT_DATE) AND status_order = :status
		ORDER BY orders.due_date;');

        $this->bind(':userID', $user);
        $this->bind(':status', "new");

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }


    public function showUserDistance(int $user) : Array|Bool{
        $interval = 30;
        $this->query('SELECT 
            SUM(r.distance) AS total_distance,
            COUNT(r.id_route) AS total_routes
        FROM public.route r
        WHERE r.id_operator_fk = :userID
        AND r.time_travel_out >= CURRENT_DATE - INTERVAL \'' . $interval . ' days\';');

        $this->bind(':userID', $user);

        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }
}