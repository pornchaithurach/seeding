<?php
/**
 * Created by PhpStorm.
 * User: pornchai
 * Date: 27/4/2018 AD
 * Time: 11:50
 */

namespace App\Http\Controllers;

use App\Models\Agency;

class OperationController extends Controller
{
    public function operation(){
        $agency_name = Agency::getAgencyName();
        return view('/budget/operation',[
            'agency_name'=>$agency_name,
        ]);
    }

}