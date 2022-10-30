<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('users')->truncate();
        $faker=Factory::create();
        for ($i=0;$i<15;$i++)
        {
            DB::table('users')->insert([
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email_user'=>$faker->email,
                'password'=>password_hash($faker->firstName,PASSWORD_DEFAULT),
                'position'=>$faker->numberBetween(1,6),
                'created_at'=>Carbon::now()
                ]);
        }

    }
}
