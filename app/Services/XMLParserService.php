<?php

namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\News;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url,category]'],
        ]);
        foreach ($data['news'] as $news) {
            if (!$news['category']) {
                $categoryName = $data['title'];
            } else {
                $categoryName = $news['category'];
        }
            $category = Category::query()->firstOrCreate([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);
            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'is_private' => false,
                'image' => $news['enclosure::url'],
                'category_id' => $category->id
            ]);
        }
    }
}
