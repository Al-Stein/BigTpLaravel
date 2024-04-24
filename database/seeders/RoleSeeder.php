<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["idRole"=>"1",'nom' => 'admin'],);
        Role::create(["idRole"=>"2",'nom' => 'superadmin'],);
        Role::create(["idRole"=>"3",'nom' => 'moderateur'],);
        Role::create(["idRole"=>"4",'nom' => 'user'],);
        

    }
}
