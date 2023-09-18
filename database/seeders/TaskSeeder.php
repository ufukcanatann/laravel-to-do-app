<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = ['Birinci Görev','İkinci Görev', 'Üçüncü Görev'];
        DB::table('users')->insert([
            'name' => $tasks,
            'completed' => rand(0,2)
        ]);
    }
}
