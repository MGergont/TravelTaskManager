<?php

declare(strict_types=1);

namespace Src\Models\Operator;

use Src\Models\AbstractModel;

class FleetModel extends AbstractModel{

    public function addFleet(array $data, string $status, string $path): Bool{
        $this->query('INSERT INTO public.company_cars (license_plate, brand, model, production_year, mileage, status, id_operator_fk, last_service, end_of_insurance, end_of_tech_inspect, img_path) VALUES (:license, :brand, :model, :production, :mileage, :status, NULL, :service, :insurance, :inspect, :img_path);');
        
        $this->bind(':license', $data['license']);
        $this->bind(':brand', $data['brand']);
        $this->bind(':model', $data['model']);
        $this->bind(':production', $data['production']);
        $this->bind(':mileage', $data['mileage']);
        $this->bind(':service', $data['service']);
        $this->bind(':insurance', $data['insurance']);
        $this->bind(':inspect', $data['inspect']);
        $this->bind(':status', $status);
        $this->bind(':img_path', $path);
        
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
            cc.img_path,
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

    public function dellFeet(int $idCar) : Bool {
        $this->query('DELETE FROM public.company_cars WHERE id_car = :idCar');

        $this->bind(':idCar', $idCar);

        if($this->execute()){
            return true;
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

    public function updateFleet(array $data, string $path) : Bool {
        $this->query('UPDATE public.company_cars SET license_plate = :license, brand = :brand, model = :model, production_year = :production, mileage = :mileage, status = :status, id_operator_fk = :id_oper, last_service = :service, end_of_insurance = :insurance, end_of_tech_inspect = :inspect, img_path = :path WHERE id_car = :id');
        $this->bind(':license', $data['license']);
        $this->bind(':brand', $data['brand']);
        $this->bind(':model', $data['model']);
        $this->bind(':production', $data['production']);
        $this->bind(':mileage', $data['mileage']);
        $this->bind(':service', $data['service']);
        $this->bind(':insurance', $data['insurance']);
        $this->bind(':inspect', $data['inspect']);
        $this->bind(':status', $data['status']);
        if ($data['id_oper'] === "NULL") {
            $this->bind(':id_oper', NULL);
        }else{
            $this->bind(':id_oper', $data['id_oper']);
        }
        $this->bind(':path', $path);
        $this->bind(':id', $data['id']);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function showUserFleet(int $id) : Array|Bool{
        $this->query('SELECT
            cc.id_car,
            cc.license_plate,
            cc.brand,
            cc.model,
            cc.production_year,
            cc.mileage,
            cc.status,
            cc.last_service,
            cc.end_of_insurance,
            cc.end_of_tech_inspect,
            cc.id_operator_fk,
            cc.img_path
        FROM public.company_cars cc WHERE id_operator_fk = :id');

        $this->bind(':id', $id);
    
        $row = $this->singleArray();
    
        if($this->rowCount() == 1){
            return $row;
        }else{
            return false;
        }
    }

    public function showUserCarCosts(int $idCar) : Array|Bool{
        $this->query('SELECT * FROM public.car_expenses WHERE id_car = :idCar');

        $this->bind(':idCar', $idCar);
    
        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function addCost(array $data): Bool{
        $this->query('INSERT INTO public.car_expenses(id_car, expense_date, category, amount, description) VALUES (:id, :expenseDate, :category, :amount, :description);');
        
        $this->bind(':expenseDate', $data['expenseDate']);
        $this->bind(':category', $data['category']);
        $this->bind(':amount', $data['amount']);
        $this->bind(':description', $data['description']);
        $this->bind(':id', $data['id']);

        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function dellCost(int $id) : Bool {
        $this->query('DELETE FROM public.car_expenses WHERE id_expense = :idCost');

        $this->bind(':idCost', $id);

        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function editCost(array $data): Bool{
        $this->query('UPDATE public.car_expenses SET expense_date = :expenseDate, category = :category, amount = :amount, description = :description WHERE id_expense = :id');
        
        $this->bind(':expenseDate', $data['expenseDate']);
        $this->bind(':category', $data['category']);
        $this->bind(':amount', $data['amount']);
        $this->bind(':description', $data['description']);
        $this->bind(':id', $data['id']);

        
        if($this->execute()){
            return true;
        }else{
            return false;
        }
    }
}