<?php

declare(strict_types=1);

namespace Src\Models\Admin;

use PhpParser\Node\Expr\Cast\Bool_;
use Src\Models\AbstractModel;

class DashboardAdminModel extends AbstractModel{
    
    public function showStatusOrders() : Array|Bool{
        $this->query('SELECT user_grant, COUNT(*) AS user_count
            FROM public.operator
            GROUP BY user_grant;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showUserErrorLogin() : Array|Bool{
        $this->query('SELECT 
                id_operator, 
                name, 
                last_name, 
                email, 
                login_error 
            FROM public.operator
            WHERE login_error > 0
            ORDER BY login_error DESC
            LIMIT 5;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showStatusUser() : Array|Bool{
        $this->query('SELECT user_status, COUNT(*) AS user_count
            FROM public.operator
            GROUP BY user_status;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showQuery() : Array|Bool{
        $interval = 1;

        $this->query('SELECT 
                date_trunc(:hour, query_start) AS hour,
                COUNT(*) AS query_count
                FROM pg_stat_activity
                WHERE query_start >= NOW() - INTERVAL \'' . $interval . 'day\'
                GROUP BY hour
                ORDER BY hour DESC;');

        $this->bind(':hour', "hour");

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showEmail() : Array|Bool{
        $interval = 7;

        $this->query('SELECT recipient_email, subject, sent_at, status
                FROM public.sent_emails
                WHERE sent_at >= CURRENT_DATE - INTERVAL \'' . $interval . 'day\'
                ORDER BY sent_at DESC Limit 5;');

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function showInactiveUsers() : Array|Bool{
        $interval = 30;

        $this->query('SELECT id_operator AS user_id, name, last_name, email, last_login, :operator AS role FROM public.operator WHERE last_login < CURRENT_DATE - INTERVAL \'' . $interval . 'day\'
        UNION ALL
        SELECT id_admin AS user_id, name, last_name, email, last_login, :admin AS role FROM public.admin WHERE last_login < CURRENT_DATE - INTERVAL \'' . $interval . 'day\' ORDER BY last_login ASC');

        $this->bind(':operator', "operator");
        $this->bind(':admin', "admin");

        $row = $this->allArray();
    
        if($this->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

}