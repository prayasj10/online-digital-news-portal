<?php

use Illuminate\Database\Seeder;

class AwardNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AwardName::create(['name'=>'Ace of Initiative','awardcategory_id'=>1]);
        \App\AwardName::create(['name'=>'Cruising and Crushing it','awardcategory_id'=>1]);
        \App\AwardName::create(['name'=>'Cloud 9 Collaborator','awardcategory_id'=>1]);
        \App\AwardName::create(['name'=>'Highest of High Fives','awardcategory_id'=>1]);
        \App\AwardName::create(['name'=>'High Five Award','awardcategory_id'=>1]);

        \App\AwardName::create(['name'=>'President’s Circle','awardcategory_id'=>2]);
        \App\AwardName::create(['name'=>'Chairman’s Award','awardcategory_id'=>2]);
        \App\AwardName::create(['name'=>'Leadership Award','awardcategory_id'=>2]);
        \App\AwardName::create(['name'=>'Pinnacle Award','awardcategory_id'=>2]);
        \App\AwardName::create(['name'=>'Spotlight Award','awardcategory_id'=>2]);

        \App\AwardName::create(['name'=>'Circle of Excellence','awardcategory_id'=>3]);
        \App\AwardName::create(['name'=>'Hall of Fame','awardcategory_id'=>3]);
        \App\AwardName::create(['name'=>'Honor Club','awardcategory_id'=>3]);
        \App\AwardName::create(['name'=>'Diamond Club','awardcategory_id'=>3]);
        \App\AwardName::create(['name'=>'Leaderboard Award','awardcategory_id'=>3]);

        \App\AwardName::create(['name'=>'Calmer of Storms','awardcategory_id'=>4]);
        \App\AwardName::create(['name'=>'Customer Whisperer','awardcategory_id'=>4]);
        \App\AwardName::create(['name'=>'Client Comforter','awardcategory_id'=>4]);
        \App\AwardName::create(['name'=>'Platinum Service Award','awardcategory_id'=>4]);
        \App\AwardName::create(['name'=>'Consider it Done Award','awardcategory_id'=>4]);

        \App\AwardName::create(['name'=>'Associate Appreciation','awardcategory_id'=>5]);
        \App\AwardName::create(['name'=>'Sidekick Salute','awardcategory_id'=>5]);
        \App\AwardName::create(['name'=>'You’re a Gem','awardcategory_id'=>5]);
        \App\AwardName::create(['name'=>'Ripple Effect Award','awardcategory_id'=>5]);
        \App\AwardName::create(['name'=>'Key Contributor','awardcategory_id'=>5]);
    }
}
