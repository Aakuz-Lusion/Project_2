<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Mr. Sharma',
                'email' => 'sharma@school.com',
                'password' => bcrypt('password'),
                'subject' => 'math',
                'grade' => 'Grade 5-A',
                'priority' => 'high',
                'days' => ['Sunday', 'Monday', 'Wednesday', 'Thursday'],
                'periods' => [1, 2, 4, 5]
            ],
            [
                'name' => 'Ms. Gurung',
                'email' => 'gurung@school.com',
                'password' => bcrypt('password'),
                'subject' => 'english',
                'grade' => 'Grade 5-A',
                'priority' => 'high',
                'days' => ['Sunday', 'Tuesday', 'Wednesday', 'Friday'],
                'periods' => [1, 3, 4, 7]
            ],
            [
                'name' => 'Mr. Thapa',
                'email' => 'thapa@school.com',
                'password' => bcrypt('password'),
                'subject' => 'science',
                'grade' => 'Grade 5-B',
                'priority' => 'medium',
                'days' => ['Monday', 'Tuesday', 'Thursday', 'Friday'],
                'periods' => [2, 3, 5, 6]
            ],
            [
                'name' => 'Ms. Adhikari',
                'email' => 'adhikari@school.com',
                'password' => bcrypt('password'),
                'subject' => 'nepali',
                'grade' => 'Grade 5-B',
                'priority' => 'medium',
                'days' => ['Sunday', 'Monday', 'Wednesday', 'Friday'],
                'periods' => [1, 2, 6, 7]
            ],
            [
                'name' => 'Mr. Poudel',
                'email' => 'poudel@school.com',
                'password' => bcrypt('password'),
                'subject' => 'social',
                'grade' => 'Grade 4-A',
                'priority' => 'low',
                'days' => ['Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'periods' => [3, 4, 5, 7]
            ],
        ];

        foreach ($teachers as $teacherData) {
            // Check if teacher already exists
            Teacher::firstOrCreate(
                ['email' => $teacherData['email']], // Check by email
                $teacherData // Create with this data if not found
            );
        }
    }
}