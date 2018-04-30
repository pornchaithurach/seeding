<?php
/**
 * Created by PhpStorm.
 * User: pornchai
 * Date: 27/4/2018 AD
 * Time: 11:47
 */

namespace App\Http\Controllers;

use App\Models\Agency;

class InvestController extends Controller
{
    public function invest(){
        $agency_name = Agency::getAgencyName();
        return view('/budget/invest',[
            'agency_name'=>$agency_name,
        ]);
    }

}