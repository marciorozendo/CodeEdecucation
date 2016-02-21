<?php

use CodeEducation\Entities\User;
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
//        Project::truncate();
        factory(User::class)->create([
            'name' => 'Marcio Rozendo',
            'email' => 'adm.evento@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            ]);

        factory(User::class, 10)->create();
    }
}
