<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsPage extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function newsPageTest()
    {
        $response = $this->get('/news');

        $response->assertSeeText(' <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Футбол. Лига Чемпионов Ливерпуль - Наполи</h5>
                                                                            <a href="http://localhost/news/sport/1"
                                           class="btn btn-secondary">Читать
                                            далее...</a>
                                                                    </div>
                            </div>');
    }
}
