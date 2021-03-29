<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaintenanceRequest;
use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $vehicles = auth()->user()->vehicles->all();
        
        return view("site.maintenance.create", [
            'vehicles' => $vehicles
            ]);
    }
        
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(MaintenanceRequest $request)
    {
        $vehicle = auth()->user()->vehicles()->find($request['vehicle']);
        if (!$vehicle) {
            flash("Veículo não encontrado")->info();
            return redirect()->back();
        }
        
        if ($request->date < Carbon::today()) {
            $json['access'] = false;
            $json['message'] = "Data de agendamento menor que o dia atual";
            
            return $json;
        }
            
        $vehicle->maintenances()->create($request->all());
        
        flash("Manuteção agendada com sucesso")->success();
        $json['redirect'] = Route("user.home");
        
        return $json;
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {           
        $maintenance = Maintenance::find($id);
        
        if ($maintenance->vehicle->user_id != auth()->user()->id) {
            flash("Agendamento não encontrado. Tente novamente");
            return redirect()->back();
        }        
        
        return view("site.maintenance.edit", [
            "vehicle" => $maintenance->vehicle,
            "maintenance" => $maintenance
            ]);
    }
            
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(MaintenanceRequest $request, $id)
    {        
        $maintenance = Maintenance::find($id);
        if ($maintenance->vehicle->user_id != auth()->user()->id) {
            flash("Agendamento não encontrado. Tente novamente");
            return redirect()->back();
        }
        
        if ($request->date < Carbon::today()) {
            $json['access'] = false;
            $json['message'] = "Data de agendamento menor que o dia atual";
            
            return $json;
        }
        
        $maintenance->update($request->all());
        flash("Agendamento atualizado com sucesso")->success();
        
        $json['redirect'] = Route("user.home");
        return $json;
    }
            
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);
        if ($maintenance->vehicle->user_id != auth()->user()->id) {
            flash("Agendamento não encontrado. Tente novamente");
            return redirect()->back();
        }
        
        $maintenance->delete();
        
        flash("Agendamento excluído com sucesso")->success();
        return redirect()->back();
    }
}        