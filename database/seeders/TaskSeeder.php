<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = ['Birinci Görev', 'İkinci Görev', 'Üçüncü Görev', 'Dördüncü Görev', 'Beşinci Görev'];

        foreach ($tasks as $task) {
            DB::table('tasks')->insert([
                'title' => $task,
                'completed' => rand(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
