<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // default
        DB::table('avatars')->insert([
            'name' => 'Default',
            'argument' => '1',
            'path' => 'default.png'
        ]);
    }
}
