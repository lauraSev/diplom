<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            'email'=>'admin',
            'name'=>'admin',
            'password'=>\Hash::make('admin'),
            'group'=>'A'
        ]);
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email,
                'password' => $faker->text,
            ]);
        }
    }
}
