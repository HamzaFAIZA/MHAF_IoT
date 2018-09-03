<?php

namespace App\Http\Controllers\Devices;

use App\Http\Controllers\Controller;
use App\Models\DataGroup;
use App\Models\Template;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $templates = Template::all();
        return view('templates.list')->with('templates' , $templates);
        //return Template::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daragrp = DataGroup::all();
        return view('templates.create')->with('datagrp', $daragrp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $template = new Template();
        $template->name = $request->input('name');
        $template->location = $request->input('location');
        $template->timezone = $request->input('timeZone');
        $template->description = $request->input('description');
        $template->noOfPackets = $request->input('NoPackets');
        $template->timePeriod = $request->input('timePeriod');
        $template->dataSource = $request->input('dataSource');
        $template->login = $request->input('lg');
        $template->pwd = $request->input('password');
        $template->MQTTTopic = $request->input('mqtttopic');
        $template->unity = $request->input('unity');

        $template->datagroups = DataGroup::whereIn("_id",$request->datagrps)->get()->toArray();

        //$template->datagroups = $request->input('datagrps');
        //$list = $request->input('datagrps');
        //$datagrpss = array();

        /*for ($i=0;$i < count($list);$i=$i+1){
            $datagroup = DataGroup::all()->where('_id', $list[$i])->first();
            $d = new DataGroup();
            //$d->id = $datagroup->_id;
            $d->name = $datagroup->name;
            $d->description = $datagroup->description;
            $datagrpss[$i] = $d;
        }*/
        //$template->datagroups = $datagrpss->toArray();
        //return $datagrpss[0];

        //for ($i=0;$i < count($datagrpss);$i=$i+1) {
          //  Template::where('name', $template->name)->push('datagroups', array('_id' => $datagrpss[$i]->name));
        //}
        //Template::where('name', $template->name)->push('datagroups', array($datagrpss[1]));
        $template->save();
        return redirect('/templates')->with('success', 'Template created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
