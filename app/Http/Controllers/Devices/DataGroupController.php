<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 08/02/2018
 * Time: 20:08
 */

namespace App\Http\Controllers\Devices;


use App\Http\Controllers\Controller;
use App\Models\DataGroup;
use App\Models\DataType;
use Illuminate\Http\Request;

class DataGroupController extends Controller
{

    public function index()
    {
        $datatypes = DataType::where('data_type_name','=','Sound')->get();
        /*$test = DataGroup::where('_id','5a8208004f9def1300001c27')->get();
        foreach ($test as $item) {
            echo $item->datatypes;
        }*/

        /*foreach ($test->datatypes as $t) {
            echo $t;
        }*/
        $dataGroup = new DataGroup;
        $dataGroup->name = 'dataGoup1';
        $dataGroup->description = 'many to many test';
        $dataGroup->accuracy = 20;
        $dataGroup->time_period = 5;
        $dataGroup->time_unit = 'week';
        $dataGroup->action = 'Blacklisted';
        $dataGroup->datatypes = $datatypes->toArray();
        $dataGroup->save();
        return view('home');

    }

    public function allDataGroup(){
        $dataGroups = DataGroup::get();
        return view('all_data_group')->with('datas', $dataGroups);
    }

    public function addDataGroup(Request $request){
        $dataGroup = new DataGroup;
        $dataGroup->name = $request->name;
        $dataGroup->description = $request->description;
        $dataGroup->accuracy = $request->accuracy;
        $dataGroup->time_period = $request->time_period;
        $dataGroup->time_unit = $request->time_unit;
        $dataGroup->action = $request->action;
        $dataGroup->datatypes = DataType::whereIn("_id",$request->dataTypes)->get()->toArray();
        $dataGroup->save();
        // return $request->dataTypes;
        return redirect('home');
    }

    public function showAddDataGroup(){
        $dataTypes = DataType::get();
        return view('add_data_group')->with('datas', $dataTypes);
    }

}