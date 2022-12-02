<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryCreatorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', 'Новая')
                ->press('Добавить')
                ->assertPathIs('/admin/categories')
                ->assertSee('Категория добавлена успешно');

            $browser->screenshot('testFormAddCategory');
        });
    }
}
