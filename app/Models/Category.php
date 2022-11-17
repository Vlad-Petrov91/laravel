<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Category
{
    private array $categories = [
        1 => [
            'id' => 1,
            'name' => 'Спорт',
            'slug' => 'sport',
        ],
        2 => [
            'id' => 2,
            'name' => 'Экономика',
            'slug' => 'economy',
        ],
        3 => [
            'id' => 3,
            'name' => 'Технологии',
            'slug' => 'technologies',
        ],
        4 => [
            'id' => 4,
            'name' => 'Авто',
            'slug' => 'auto',
        ],
        5 => [
            'id' => 5,
            'name' => 'Дом',
            'slug' => 'house',
        ],
        6 => [
            'id' => 6,
            'name' => 'Медицина',
            'slug' => 'medicine',
        ],
    ];

    /**
     * @return array[]
     */
    public function getCategories()
    {
        //return $this->categories;
        return json_decode((Storage::disk('local')->get('categories.json')), true);
    }

    public function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public function getCategoryNameBySlug($slug)
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        if ($category != []) {
            return $category['name'];
        } else {
            return null;
        }
    }

    public function getCategoryById($id)
    {
        if (array_key_exists($id, $this->getCategories()))
            return $this->categories[$id];
        else return null;
    }

    public function getCategorySlugById($id)
    {
        if (array_key_exists($id, $this->getCategories()))
            return $this->categories[$id]['slug'];
        else return null;
    }
}
