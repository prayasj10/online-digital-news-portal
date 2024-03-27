<?php

use Illuminate\Database\Seeder;

class AwardCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $awardcategory = \App\AwardCategory::create(['name'=>'Above and Beyond Recognition']);

        $awardcategory = \App\AwardCategory::create(['name'=>'Top Performer Award Names']);

        $awardcategory = \App\AwardCategory::create(['name'=>'Top Recognition Club Names']);

        $awardcategory = \App\AwardCategory::create(['name'=>'Customer Service Award Names']);

        $awardcategory = \App\AwardCategory::create(['name'=>'Peer to Peer Recognition Program Names']);
    }
}
