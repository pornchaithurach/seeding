<?php
/**
 * Created by PhpStorm.
 * User: pornchai
 * Date: 27/4/2018 AD
 * Time: 11:39
 */

namespace App\Http\Controllers;

use App\Models\Agency;

class AuthorizeController extends Controller
{
    public function index(){
        $agency_name = Agency::getAgencyName();

        return view('/seed/index',[
            'agency_name'=>$agency_name,
        ]);
    }

}