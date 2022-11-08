<?php

namespace App\Models;


class Categories
{
    private static $categories = [
        [
            'id' => 1,
            'name' => 'Спорт',
            'slug' => 'sport',
        ],
        [
            'id' => 2,
            'name' => 'Экономика',
            'slug' => 'economy',
        ],
        [
            'id' => 3,
            'name' => 'Технологии',
            'slug' => 'technologies',
        ],
        [
            'id' => 4,
            'name' => 'Авто',
            'slug' => 'auto',
        ],
        [
            'id' => 5,
            'name' => 'Дом',
            'slug' => 'house',
        ],
    ];

    /**
     * @return array[]
     */
    public static function getCategories(): array
    {
        return self::$categories;
    }

    public static function getCategoryNews($slug): array
    {
        return array_filter(News::getNews(), fn($item) => $item['slug'] == $slug);
    }
}
