<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Permission::factory()->create([
            'group_name'=>'Админ',
            'permission'=>'admin'
        ]);
        \App\Models\Permission::factory()->create([
            'group_name'=>'Редакторы',
            'permission'=>'redactor'
        ]);
        \App\Models\Permission::factory()->create([
            'group_name'=>'Врачи',
            'permission'=>'doctor'
        ]);
        \App\Models\Permission::factory()->create([
            'group_name'=>'Пользователи',
            'permission'=>'user'
        ]);
    }
}
