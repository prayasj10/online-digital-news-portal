<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::create(['name'=>'User']);
        $role->permissions()->sync([1,5,9,13,17]);

        $role = \App\Role::create(['name'=>'Administrator']);
        $role->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);

        $role = \App\Role::create(['name'=>'Manager']);
        $role->permissions()->sync([1,2,3,4]);

    }
}
