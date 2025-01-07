<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create multiple student users
        Student::factory()->count(10)->create()->each(function ($student) {
           $user = User::create([
                'name' => $student->name,
                'email' => $student->email,
                'password' => $student->password,
                'role' => 'user',
            ]);

            $student->user_id = $user->id;
            $student->save();
        });
    }
}
