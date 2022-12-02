<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryExistingCreatorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddExistingCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', 'Спорт')
                ->press('Добавить')
                ->assertSee('Такое значение поля Имя уже существует');

            $browser->screenshot('testFormAddExistingCategory');
        });
    }
}
