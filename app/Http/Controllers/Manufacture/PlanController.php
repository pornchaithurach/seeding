<?php
/**
 * Created by PhpStorm.
 * User: pornchai
 * Date: 27/4/2018 AD
 * Time: 11:53
 */

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Manufacture_Plan;
use App\Models\ManufacturePlan;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function indexPlan()
    {
        $user_opaerate = Auth::user();
        $seed_type = array('1'=>'ตันพันธุ์','2'=>'ท่อนพันธุ์','3'=>'เนื้อเยื่อ');

        $agency_name = Agency::getAgencyName();
        $plants = Plant::where('active_status',1)
                    ->orderby('detail_code')
                    ->get();
        foreach ($plants as $plant){
            $plant_names[$plant->detail_code] = $plant->detail_name;
        }

        $plans = ManufacturePlan::where('agency_code',$user_opaerate->agency)
                                    ->orderby('id')
                                    ->get();


        return view('/manufacture/plan',[
            'agency_name'=>$agency_name,
            'plant_names' => $plant_names,
            'plans' => $plans,
            'seed_type' => $seed_type,
        ]);
    }


    public function createPlan()
    {
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        return view('');

    }
    public function storePlan(Request $request)
    {
        request()->validate([
            'seed_type' => 'required',
            'seed_plant' => 'required',
            'date-produce-start' => 'required',
        ]);

        ManufacturePlan::create($request->all());

        return redirect()->route('produce/indexPlan')
            ->with('success','บันทึกแผนการผลิตเรียบร้อยแล้ว');

    }
    public function showPlan()
    {

    }
    public function editPlan()
    {

    }
    public function updatePlan()
    {

    }
    public function destroyPlan($id)
    {
        $plan = ManufacturePlan::find($id);
        $plan->delete();
        return redirect()->route('produce/indexPlan')
            ->with('success','Information has been  deleted');
    }

}