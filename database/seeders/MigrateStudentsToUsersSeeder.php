<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class MigrateStudentsToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();

        foreach ($students as $student) {
            User::create([
                'name' => $student->name,
                'email' => $student->email,
                'password' => $student->password,
                'role' => 'user',
            ]);
        }
    }
}
