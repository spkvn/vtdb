<?php

use Illuminate\Database\Seeder;
use ToDo\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            Task::create([
                'name' => $faker->sentence,
                'description' => $faker->paragraph
            ]);
        }
    }
}
