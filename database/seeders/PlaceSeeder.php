<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PlaceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('places')->insert([
            [
                'name'       => 'ShopOne 24',
                'address'    => '東京都新宿区西新宿1-1-1',
                'tel'        => '03-1234-5678',
                'class'      => 1,
                'terminate'  => '2025-12-31',
                'group_id'   => 1001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Cafe Alpha7',
                'address'    => '大阪府大阪市中央区南船場4-4-4',
                'tel'        => '06-2345-6789',
                'class'      => 2,
                'terminate'  => null,
                'group_id'   => 1002,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Beauty3 Studio',
                'address'    => '愛知県名古屋市中村区名駅3-3-3',
                'tel'        => '052-345-7890',
                'class'      => 3,
                'terminate'  => '2026-03-31',
                'group_id'   => 1003,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

