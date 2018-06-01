<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RubricsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i=0; $i<=9;$i++){
        DB::table('rubrics')->insert([
           'name' => $faker->company,
           'description' => $faker->text,
       ]);
     }
    }
}
