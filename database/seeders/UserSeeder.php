<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('code', 'admin')->first();
        $role_manager = Role::where('code', 'manager')->first();
        $role_user = Role::where('code', 'user')->first();

        User::create([
            'surname' =>        'Уляхин',
            'name' =>           'Василий',
            'patronymic'=>      'Алексеевич',
            'sex'=>             1,
            'birthday'=>        '1987-12-11',
            'email'=>           'cristaldevil@mail.ru',
            'password'=>        'cristaldevil',
            'nickname'=>        'alomon',
            'avatar'=>          null,
            'phone'=>           '+7(913)114-10-17',
            'api_token'=>       '1',
            'role_id'=>         $role_admin->id,
        ]);
        User::create([
            'surname'       =>        'Евсеев',
            'name'          =>           'Дмитрий',
            'patronymic'    =>      'Витальевич',
            'sex'           =>             1,
            'birthday'      =>        '2005-11-04',
            'email'         =>           'dima112831@gmail.com',
            'password'      =>        'crofty1337',
            'nickname'      =>        'crofty1337',
            'avatar'        =>          null,
            'phone'         =>           '+7(952)164-19-03',
            'api_token'     =>       '2',
            'role_id'       =>         $role_user->id,
        ]);
        User::create([
            'surname' =>        'Окулов',
            'name' =>           'Семён',
            'patronymic'=>      'Михайлович',
            'sex'=>             1,
            'birthday'=>        '2005-10-10',
            'email'=>           'scuffs@mail.ru',
            'password'=>        'scuffs',
            'nickname'=>        'scuffs',
            'avatar'=>          null,
            'phone'=>           '+7(925)343-61-20',
            'api_token'=>       '3',
            'role_id'=>         $role_manager->id,
        ]);

    }
}
