<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Permission::create(['name'=>'user-view']);
        \App\Permission::create(['name'=>'user-create']);
        \App\Permission::create(['name'=>'user-update']);
        \App\Permission::create(['name'=>'user-delete']);

        \App\Permission::create(['name'=>'category-view']);
        \App\Permission::create(['name'=>'category-create']);
        \App\Permission::create(['name'=>'category-update']);
        \App\Permission::create(['name'=>'category-delete']);

        \App\Permission::create(['name'=>'author-view']);
        \App\Permission::create(['name'=>'author-create']);
        \App\Permission::create(['name'=>'author-update']);
        \App\Permission::create(['name'=>'author-delete']);

        \App\Permission::create(['name'=>'post-view']);
        \App\Permission::create(['name'=>'post-create']);
        \App\Permission::create(['name'=>'post-update']);
        \App\Permission::create(['name'=>'post-delete']);

        \App\Permission::create(['name'=>'customer-view']);
        \App\Permission::create(['name'=>'customer-create']);
        \App\Permission::create(['name'=>'customer-update']);
        \App\Permission::create(['name'=>'customer-delete']);

        \App\Permission::create(['name'=>'role-view']);
        \App\Permission::create(['name'=>'role-create']);
        \App\Permission::create(['name'=>'role-update']);
        \App\Permission::create(['name'=>'role-delete']);

    }
}
