<?php
/**
 * Created by PhpStorm.
 * User: Anis
 * Date: 2/7/2018
 * Time: 7:06 PM
 */

namespace App\Http\Controllers\Devices;


use App\Http\Controllers\Controller;
use App\Models\DataGroup;
use App\Models\DataType;
use App\Models\DataValue;
use App\Models\Device;
use App\DeviceData;
use App\Models\Prediction;
use App\Models\Template;
use App\Models\Trigger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Array_;

class DevicesController extends Controller
{
    public function show()
    {
        // Get all devices
        $devices = Device::all();
        // Send them to the blade's view
        //return $devices[1]->id;
        return view("devices/show", array("devices" => $devices));
    }

    public function add()
    {

        // Do we have an add form
        $name = Input::get("name");
        if(!isset($name)){
            $templates = Template::all();
            return view("devices/add")->with("templates", $templates);
        }
        else
        {
            $indice = -1;
            $template = Input::get("template");
            $temp = Template::all()->where('_id', $template[0])->toArray();
            $c = Template::all();
            for ($x = 0; $x<$c->count(); $x++)
            {
                if($c[$x]->_id == $template[0])
                {
                    $indice = $x;
                }
            }
            // Get parameters
            $description = Input::get("description");
            $location = Input::get("location");
            $template = Input::get("template");
            // Validate parameters
            if(!isset($description) || !isset($location) || !isset($template))
                return view("devices/add", array("error" => "Missing parameters, Please try again !"));

            // Get locations
            $longitude = strtok($location, ",");
            $latitude = strtok(",");

            $longitude = substr($longitude, 1);
            $latitude = substr($latitude, 0, strlen($latitude) - 1);
            // Create a new device model
            Device::create(array('name' => $name, 'longitude' => $longitude, 'latitude' => $latitude,
                'description' => $description, 'templates_id' => $template[0]));


            // fill device data
            $deviceData = new DeviceData();
            $temp = Template::all()->where('_id', $template[0])->toArray();
            $deviceData->template = $temp[$indice];
            $deviceData->value = "2019";
            $deviceData->save();
            //return Template::all()->where('_id', $template[0])->first();

            return Redirect::route('devices_show', array('success' => "Device \"$name\" was successfully created."));
        }
    }

    public function connect()
    {
        return DeviceData::all();
    }

    public function data()
    {
        // Get id
        $id = Input::get("id");
        $device_id = Input::get("deviceid");
        $value = Input::get("value");
        //$name = DB::table('templates')->where('_id', '5a848a94ce74e01bbc0e880d')->first();

        //DeviceData::create(array('name' => $name, 'value' => 'aaa'));
        //DeviceData::create(array('name' => $name, 'value' => 'aaa'));
        // Send data
        DataValue::create(array('data_id' => $id, 'value' => $value, 'device_id' => $device_id));

        $dt= DataType::where("_id",$id)->get();
        //$trigger = Trigger::all()->first();
        //$triggerDT= Trigger::where("_id","5a9dcffc7235e61bd0004d39")->pluck("datatype");
        $trigger = Trigger::select("select * from triggers WHERE datatype._id == ".$id)->first();
        $t = Trigger::all()->where("_id", $trigger->_id);
        //echo $trigger->value;
        return $t;
    }

    public function predict($id)
    {
        $command = escapeshellcmd('python pred.py '.$id);
        shell_exec($command);
    }

    public function showData($id)
    {
        $id = "5b0b579b7235e6283c00527d";

        $devices = DataValue::where('device_id', $id)->get();
        if($devices->count() == 0)
        {
            return redirect()->route('nodata');
        }
        $c = 0;

        // different data types IDs
        $dataTypeIds = array();

        //find number of data types

        //fill the dataVeues names in list
        $labelList = array();
        $label1 = DataType::where('_id', $devices[0]->data_id)->get();
        $labelList [0] = $label1[0]->data_type_name;

        //$dataTypeIds[$label1[0]->data_type_name] = $devices[0]->data_id;
        $dataTypeIds[0] = $devices[0]->data_id;
        for($i = 1; $i < $devices->count(); $i++){
            if(!(in_array($devices[$i]->data_id, $dataTypeIds)))
            {
                $label1 = DataType::where('_id', $devices[$i]->data_id)->get();
                $c++;
                $dataTypeIds[$c] = $devices[$i]->data_id;
                $labelList [$c] = $label1[0]->data_type_name;
            }
        }

        //fill list with data value arrays()
        $devicesArray = array();
        for($cpt = 0; $cpt < count($dataTypeIds); $cpt++)
        {
            /*$ar = array();
            for($i2 = 0; $i2 < $devices->count(); $i2++)
            {
                if($devices[$i2]->data_id == $dataTypeIds[$cpt])
                {
                    $ar[] = $devices[$i2];
                }
            }*/
            $devicesArray[] = DataValue::where('device_id', $id)->where('data_id', $dataTypeIds[$cpt])->get();
        }

        $trigger1 = Trigger::all()->first();
        $triggers = array();
        for($cpt1 = 0; $cpt1 < count($dataTypeIds); $cpt1++)
        {
            $triggers[] = Trigger::where("datatype.data_type_name", $labelList[$cpt1])->get();
        }
        //$trg = ((object)($trigger[0]->datatype))->data_type_name;
        $pred = Prediction::all()->first();

        return view("./devices/DeviceData", ["dtids"=>$dataTypeIds ,"triggers"=> $triggers, "devicesArray" => $devicesArray, "labelList" => $labelList, "devicedata" => $devices, "warningValue" => $trigger1->value , "pred" => $pred->value, "dtCount" => $c+1, "dataTypeIds" => "lala"])->with('devicedata', $devices);

    }

    public function showDatas()
    {
        $devices = DataValue::all();
        $trigger = Trigger::all()->first();
        $data = [
            0 => $devices,
            1 => $trigger->value
        ];


        return view("./devices/DeviceData")->with('devicedata', $devices);
    }

    public function EmptyPage()
    {
        return view("./noDataFound");
    }

    public function shareThis()
    {
        return view("./Share");
    }

    public function addTrgigger()
    {
        $dataypes = DataType::all();
        return view("/addTrigger")->with('datatype', $dataypes);
    }

    public  function addPrediction()
    {
        Prediction::create(array('data_id' => "aaa", 'value' => "18"));
        return "Done";
    }
}