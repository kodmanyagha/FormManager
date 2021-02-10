<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save            = new User();
        $save->firstname = 'Admin';
        $save->lastname  = 'System';
        $save->group     = 'admin';
        $save->email     = 'admin@admin.com';
        $save->password  = Hash::make('123456');
        $save->save();
    }
}
