<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        DB::table('users')->insert([
            'name' => 'administrator',
            'email' => 'admin@univresity.org',
            'password' => bcrypt('secret'),
            'avatar_id' => 1
        ]);
        // teacher
        DB::table('users')->insert([
            'name' => 'teacher',
            'email' => 'teacher@univresity.org',
            'password' => bcrypt('secret'),
            'avatar_id' => 1
        ]);
        // student
        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@univresity.org',
            'password' => bcrypt('secret'),
            'avatar_id' => 1
        ]);
    }
}
