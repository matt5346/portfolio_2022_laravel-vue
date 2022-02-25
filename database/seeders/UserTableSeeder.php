<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Testing';
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('test123');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());

        $admin = new User;
        $admin->name = 'Matvey';
        $admin->email = 'matvey20.18@bk.ru';
        $admin->password = bcrypt('123123123');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
