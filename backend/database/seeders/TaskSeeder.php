<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'title' => 'Complete project documentation',
            'description' => 'Write comprehensive documentation for the task manager app',
            'priority' => 'high',
            'due_date' => '2025-07-15',
            'completed' => false
        ]);

        Task::create([
            'title' => 'Review code changes',
            'description' => 'Review the latest pull requests and provide feedback',
            'priority' => 'medium',
            'due_date' => '2025-07-14',
            'completed' => false
        ]);

        Task::create([
            'title' => 'Update dependencies',
            'description' => 'Update all npm and composer dependencies to latest versions',
            'priority' => 'low',
            'due_date' => '2025-07-20',
            'completed' => true
        ]);

        Task::create([
            'title' => 'Design new UI components',
            'description' => 'Create mockups and designs for new user interface components',
            'priority' => 'medium',
            'due_date' => '2025-07-18',
            'completed' => false
        ]);

        Task::create([
            'title' => 'Test mobile app',
            'description' => 'Comprehensive testing of the mobile application on different devices',
            'priority' => 'high',
            'due_date' => '2025-07-13',
            'completed' => false
        ]);
    }
}
