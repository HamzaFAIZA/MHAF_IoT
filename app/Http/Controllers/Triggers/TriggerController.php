<?php
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 3/5/2018
 * Time: 9:26 PM
 */

namespace App\Http\Controllers\Triggers;

use App\Http\Controllers\Controller;
use App\Models\DataType;
use App\Models\Trigger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Symfony\Component\VarDumper\Cloner\Data;



class TriggerController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'datatype' => 'string|max:255',
            'condition' => 'required|string|max:255',
            'value'=> 'required|string|max:255',
            'action' => 'required|string|max:255',
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajoutertrigger()
    {
        $datatypes = DataType::all();
        return view('triggers/add_triggers')->with('datatypes', $datatypes);
    }

    protected function insert(Request $request)
    {
        $datatype = DataType::where("_id",$request->datatype)->get()->toArray();
        $data = ['name'=>$request->name,
            //  $dataGroup->datatypes = DataType::whereIn("_id",$request->dataTypes)->get()->toArray();
            'datatype'=>$datatype[0],
            'condition'=>$request->condition,
            'value'=>$request->value

        ];
        DB::table('triggers')->insert($data);
        return redirect('showtriggers');

    }


    public function show()
    {
        $triggers = Trigger::all();
        return view("triggers/showtriggers", array("triggers" => $triggers));
    }



    protected function insertData(Request $request)
    {
        $data = ['name'=>$request->name,
            'condition'=>$request->condition,
            'value'=>$request->value

        ];
        DB::table('triggers')->insert($data);
        return redirect('showtriggers');

    }


}