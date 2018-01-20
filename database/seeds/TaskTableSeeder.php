<?php

use Illuminate\Database\Seeder;
use ToDo\Task;
use ToDo\User;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userOne = User::create([
            'name' => 'Kevin',
            'password' => bcrypt('kevin'),
            'email'   => 'kevin@dcode.com.au'
        ]);

        $userTwo = User::create([
            'name' => 'Kevin Two',
            'password' => bcrypt('kevin'),
            'email'   => 'kevintwo@dcode.com.au'
        ]);

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            Task::create([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'user_id' => ($i % 2) ? $userOne->id : $userTwo->id
            ]);
        }
    }
}
