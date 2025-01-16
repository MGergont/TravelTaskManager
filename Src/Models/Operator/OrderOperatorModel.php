<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class OrderOperatorModel extends AbstractModel{
    
    public function showOrdersOperator() : Array|Bool{
        $this->query('SELECT
			orders.id_order,
            routes.id_route,
            routes.departure_time,
			routes.arrival_time,
            orders.order_name,
            orders.status_order,
            orders.created_at,
			orders.due_date,
            orders.assigned_to,
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
        WHERE assigned_to = 8 ORDER BY orders.id_order;');
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function orderUpdateStatus(array $data): Bool{
        $this->query('UPDATE public.orders SET status_order=:status WHERE id_order = :id;');
        
        $this->bind(':id', $data['id']);
        $this->bind(':status', $data['status']);
        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}