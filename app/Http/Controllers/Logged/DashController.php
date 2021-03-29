<?php

namespace App\Http\Controllers\Logged;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{       
    public function __construct(Vehicle $vehicle)
    {
        $this->middleware("auth");        
    }
    
    public function home()
    {   
        $day7 = Carbon::now()->addDays(7);
        $today = Carbon::today();
        $maintenances = Maintenance::whereBetween("date", array($today, $day7))->with("vehicle")->latest()->paginate();
        
        return view("site.userLogged.index", [
            'user' => auth()->user(),
            'maintenances' => $maintenances
            ]);
    }
        
    public function allMaintenance()
    {
        $maintenances = Maintenance::with("vehicle")->latest()->paginate(5);
        
        return view("site.userLogged.allMaintenance", [
            'user' => auth()->user(),
            'maintenances' => $maintenances
            ]);
    }
            
            
            
    public function vehicles()
    {
        return view("site.userLogged.vehicles", [
            "vehicles" => Auth()->user()->vehicles()->latest()->paginate(5)
            ]);
    }
                
    public function logout()
    {
        Auth::logout();
        
        flash("Deslogado com sucesso")->success();
        return redirect()->route("web.login");
    }
}
            