<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 5; $i++)
      {
        Task::create([
        'title' => 'Bunyod\'s Task '. $i,
        'user_id' => 1
        ]);

        Task::create([
        'title' => 'Sevara\'s Task '. $i,
        'user_id' => 2
        ]);

        Task::create([
        'title' => 'Kamrom\'s Task '. $i,
        'user_id' => 3
        ]);
      }
    }
}
