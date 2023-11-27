<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Maak de 'admin' rol aan
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->slug = 'admin';
        $adminRole->description = 'Administrator';
        $adminRole->level = 10;
        $adminRole->save();

        // Maak de 'customer' rol aan
        $customerRole = new Role();
        $customerRole->name = 'customer';
        $customerRole->slug = 'customer';
        $customerRole->description = 'Customer';
        $customerRole->level = 1;
        $customerRole->save();
    }
}
