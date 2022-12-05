<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name'=>'admin',
            'surname'=>'admin',
            'login'=>'admin',
            'password'=>'123',
            'email'=>'admin@admin.ru',
            'tel'=>'+7 (999)-999-99-99',
            'date'=>'00/00/0000',
            'city'=>'Москва',
            'group_id'=>'1',
            'pic'=>'file',
            'spam'=>'0',
            'remember_token'=>NULL,
            'status'=>'unban'
        ]);
    }
}
