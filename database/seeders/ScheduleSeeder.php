<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // Get all teachers
        $teachers = Teacher::all();

        // Delete existing schedules
        Schedule::truncate();

        $totalSchedules = 0;

        // For each teacher, create a schedule
        foreach ($teachers as $teacher) {
            // Skip if teacher has no days or periods
            if (empty($teacher->days) || empty($teacher->periods)) {
                continue;
            }

            // For each available day
            foreach ($teacher->days as $day) {
                // For each available period
                foreach ($teacher->periods as $period) {
                    Schedule::create([
                        'day' => $day,
                        'grade' => $teacher->grade,
                        'period_id' => $period,
                        'subject' => $teacher->subject,
                        'teacher_id' => $teacher->id,
                        'teacher_name' => $teacher->name,
                    ]);
                    $totalSchedules++;
                }
            }
        }

        $this->command->info('✅ ' . $totalSchedules . ' schedule entries created!');
    }
}