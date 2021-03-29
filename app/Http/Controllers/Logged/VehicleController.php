<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view("site.vehicles.create");
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(VehicleRequest $request)
    {
        $vehicle = auth()->user()->vehicles();
        $vehicle->create($request->all());
        
        flash("Veículo cadastrado com sucesso")->success();
        
        $json['redirect'] = Route("user.vehicles");
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
        $vehicle = auth()->user()->vehicles()->find($id);        

        if (!$vehicle) {
            flash("Veículo não encontrado");
            return redirect()->back();
        }

        return view("site.vehicles.edit", [
            "vehicle" => $vehicle
        ]);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = auth()->user()->vehicles()->find($id);
        if (!$vehicle) {
            flash("Veículo não encontrado");
            return redirect()->back();
        }

        $vehicle->update($request->all());

        flash("Veículo atualizado com sucesso")->success();
        $json['redirect'] = Route("user.vehicles");

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
        $vehicle = auth()->user()->vehicles()->find($id);
        if (!$vehicle) {
            flash("Veículo não encontrado");
            return redirect()->back();
        }

        $vehicle->delete();
        
        flash("Veículo removido com sucesso")->success();
        return redirect()->back();
    }
}
