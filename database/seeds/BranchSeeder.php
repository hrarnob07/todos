<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ( $i = 0 ; $i <10 ; $i++){
            DB::table('branch')->insert([
                'name' => Str::random(10),
                'phone' =>(string) rand(1111111111,9999999999),
                'open_time' => \Carbon\Carbon::now(),
                'close_time' => \Carbon\Carbon::now()->addHours(8),
                'close_day' => Carbon\Carbon::yesterday(),
                'status' => "active",
            ]);
        }

    }
}
