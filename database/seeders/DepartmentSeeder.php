<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Department();
        $user->name = "Horeca";
        $user->save();

        $user = new Department();
        $user->name = "Bakery";
        $user->save();

        $user = new Department();
        $user->name = "E-Commerce";
        $user->save();

        $user = new Department();
        $user->name = "Modern Trade";
        $user->save();
    }
}
