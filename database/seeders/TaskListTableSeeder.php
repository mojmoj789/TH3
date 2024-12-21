<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TaskList;

class TaskListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        for($i = 0; $i < 20; $i++){
            TaskList::create([
                'title' => 'Công việc số '. $i + 1,
                'description' => $faker->text,
                'long-description' => $faker->text,
                'completed' => $faker->boolean

            ]);
        }
    }
}
