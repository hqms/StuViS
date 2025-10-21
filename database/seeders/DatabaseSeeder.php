<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create default roles
        DB::table('roles')->insert([
            ['name' => 'Administrator'],
            ['name' => 'Teacher'],
            ['name' => 'Student'],
            ['name' => 'Parent'],
        ]);

        // Create sample users
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role_id' => 1, // Administrator
            ],
            [
                'name' => 'Teacher User',
                'email' => 'teacher@example.com',
                'password' => bcrypt('password'),
                'role_id' => 2, // Teacher
            ],
            [
                'name' => 'Student User',
                'email' => 'student@example.com',
                'password' => bcrypt('password'),
                'role_id' => 3, // Student
            ],
            [
                'name' => 'Parent User',
                'email' => 'parent@example.com',
                'password' => bcrypt('password'),
                'role_id' => 4, // Parent
            ],
        ]);
    }
}