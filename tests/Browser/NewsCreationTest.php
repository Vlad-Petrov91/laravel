<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsCreationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddNews()
    {
        //use RefreshDatabase;

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('Добавление новости')
                ->type('title', 'Новость добалена через Dusk')
                ->type('text', 'Тестовый текст')
                ->press('Добавить');

            $browser->screenshot('testFormAddNews');
        });
    }
}
