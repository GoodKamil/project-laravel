<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('position')->truncate();
      DB::table('position')->insert([
          [
              'position'=>'Pracownik produkcyjny',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Księgowość',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Magazynier',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Logistyka',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Kierownik',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Biuro',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Administrator',
              'created_at'=>Carbon::now()
          ],
          [
              'position'=>'Dyrektor',
              'created_at'=>Carbon::now()
          ],
      ]);
    }
}
