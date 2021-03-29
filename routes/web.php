<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Logged\DashController;
use App\Http\Controllers\Logged\VehicleController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RETORNO DE VISÃO DAS PÁGINAS DE LOGIN E CADASTRO
Route::get("/", [WebController::class, "login"])->name('web.login');
Route::get('/cadastrar', [WebController::class, "register"])->name('web.register');


//CONTROLADORES DE AUTENTICAÇÃO LOGIN E CADASTRO
Route::prefix("/")->name("auth.")->group(function (){
    Route::post("login", [AuthController::class, "login"])->name("login");
    Route::post("register", [AuthController::class, "register"])->name("register");
});    


//ÁREA DO USUÁRIO LOGADO
Route::group(["middleware" => ["auth"]], function () {
    Route::prefix("user")->name("user.")->group(function () {
        Route::get("/", [DashController::class, "home"])->name("home");
        Route::get("/agendamentos", [DashController::class, "allMaintenance"])->name("all.maintenance");
        Route::get("/veiculos", [DashController::class, "vehicles"])->name("vehicles");
        Route::get("/sair", [DashController::class, "logout"])->name("logout");
        
        //Rotas de CRUD DO VEÍCULO
        Route::get("/veiculo/adicionar", [VehicleController::class, "create"])->name("vehicle.create");
        Route::post("/add", [VehicleController::class, "store"])->name("vehicle.store");
        Route::get("/veiculo/{id}/edit", [VehicleController::class, "edit"])->name("vehicle.edit");
        Route::put("/veiculo/{id}/update", [VehicleController::class, "update"])->name("vehicle.update");
        Route::delete("/veiculo/{id}/delete", [VehicleController::class, "destroy"])->name("vehicle.destroy");       
        
        //Rotas de CRUD DAS MANUTENÇÕES
        Route::get("/agendar", [MaintenanceController::class, "create"])->name("maintenance.create");
        Route::post("/agendar", [MaintenanceController::class, "store"])->name("maintenance.store");
        Route::get("/agendamento/{id}/edit", [MaintenanceController::class, "edit"])->name("maintenance.edit");
        Route::put("/agenda/edit/{id}", [MaintenanceController::class, "update"])->name("maintenance.update");
        Route::delete("agenda/{id}/delete", [MaintenanceController::class, "destroy"])->name("maintenance.destroy");       
        
    });
});