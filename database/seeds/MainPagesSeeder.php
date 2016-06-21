<?php

use Illuminate\Database\Seeder;

class MainPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_pages')->insert(['name' => 'О Damac']);
        DB::table('main_pages')->insert(['name' => 'Проекты Damac']);
        DB::table('main_pages')->insert(['name' => 'Предложения']);
        DB::table('main_pages')->insert(['name' => 'Инвесторам']);
    }
}
