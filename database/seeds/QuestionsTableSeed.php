<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class QuestionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i=0; $i<=200;$i++){
        DB::table('questions')->insert([
            'question' => $faker->text,
            'answer'=>($i%3==0?$faker->text:''),
            'status'=>$faker->randomElement(['P','W','H']),
            'date_answer'=>$faker->dateTime,
            'created_at'=>$faker->date('Y-m-d'),
            'updated_at'=>($i%3==0?$faker->date('Y-m-d'):'1975-01-01'),
            'created_by'=>$faker->numberBetween(1,10),
            'checked_by'=>$faker->numberBetween(1,10),
            'topic_id'=>$faker->numberBetween(1,10),
          ]);
        }
    }
}
