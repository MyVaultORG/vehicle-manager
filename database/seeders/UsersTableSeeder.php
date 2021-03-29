<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;



class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    
    public function run()
    {
        User::factory()->count(40)->create()->each(function ($user){
            for ($i=0; $i < 10; $i++) { 
                $user->vehicles()->save(Vehicle::factory()->make());
            }            
        });                
    }    
}
    