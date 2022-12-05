<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Contacts',
            'view'=>'simple',
            'title' => 'Контакты',
            'content' => file_get_contents(__DIR__.'/lr3/Contacts.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Doctors',
            'view'=>'simple',
            'title' => 'Врачи',
            'content' => file_get_contents(__DIR__.'/lr3/Doctors.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Main',
            'view'=>'simple',
            'title' => 'Основное',
            'content' => file_get_contents(__DIR__.'/lr3/MainContent.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Anesthesia-Care',
            'view'=>'simple',
            'title' => 'Лечение под наркозом',
            'content' => file_get_contents(__DIR__.'/lr3/AnesthesiaCare.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Children-Dentistry',
            'view'=>'simple',
            'title' => 'Детская стоматология',
            'content' => file_get_contents(__DIR__.'/lr3/ChildrenDentistry.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Diseases',
            'view'=>'simple',
            'title' => 'Болезни',
            'content' => file_get_contents(__DIR__.'/lr3/Diseases.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Feedback',
            'view'=>'simple',
            'title' => 'Обратная связь',
            'content' => file_get_contents(__DIR__.'/lr3/Feedback.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Services',
            'view'=>'simple',
            'title' => 'Услуги',
            'content' => file_get_contents(__DIR__.'/lr3/Services.html'),
        ]);
        \App\Models\StaticPage::factory()->create([
            'urlname'=>'Surgery',
            'view'=>'simple',
            'title' => 'Хирургия',
            'content' => file_get_contents(__DIR__.'/lr3/Surgery.html'),
        ]);
    }
}
