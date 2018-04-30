<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public  static function getAgencyName()
    {
        $agencyName = Array();

        $agencies = Agency::all();

        foreach ($agencies as $agency){
            $agencyName[$agency->department_id] = $agency->department_name;
        }
            return $agencyName;
    }
}
