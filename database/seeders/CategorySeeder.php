<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        return $categoriesArray = [['name' => 'Спорт', 'slug' => 'sport'],
            ['name' => 'Экономика', 'slug' => 'economics'],
            ['name' => 'Технологии', 'slug' => 'technology'],
            ['name' => 'Авто', 'slug' => 'auto'],
            ['name' => 'Дом', 'slug' => 'house'],
            ['name' => 'Медицина', 'slug' => 'medicine']];
    }
}
