<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(AuthorsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(PermissionsTableSeeder::class);
         $this->call(PostTableSeeder::class);
         $this->call(OpinionTableSeeder::class);
         $this->call(TagTableSeeder::class);
         $this->call(AwardCategoriesTableSeeder::class);
         $this->call(AwardNamesTableSeeder::class);
    }
}
