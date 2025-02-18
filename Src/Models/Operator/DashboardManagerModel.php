<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class DashboardManagerModel extends AbstractModel{

    public function showActiveCar() : Array|Bool{
        $this->query('SELECT COUNT(*) AS active_cars FROM public.company_cars WHERE status = :status;');

        $this->bind(':status', "in use");

        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showBiggestCostsCar() : Array|Bool{
        $interval = 6;

        $this->query('SELECT cc.license_plate, cc.brand, cc.model, SUM(ce.amount) AS total_expenses
            FROM public.car_expenses ce
            JOIN public.company_cars cc ON ce.id_car = cc.id_car
            WHERE ce.expense_date >= CURRENT_DATE - INTERVAL \'' . $interval . 'months\' GROUP BY cc.license_plate, cc.brand, cc.model ORDER BY total_expenses DESC LIMIT 5;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showStatusOrders() : Array|Bool{
        $this->query('SELECT status_order, COUNT(*) AS order_count
            FROM public.orders
            GROUP BY status_order;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showEndInsurance() : Array|Bool{
        $interval = 30;
        $this->query('SELECT id_car, license_plate, brand, model, end_of_insurance
            FROM public.company_cars
            WHERE end_of_insurance BETWEEN CURRENT_DATE AND CURRENT_DATE + INTERVAL \'' . $interval . 'days\'
            ORDER BY end_of_insurance ASC LIMIT 5;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}