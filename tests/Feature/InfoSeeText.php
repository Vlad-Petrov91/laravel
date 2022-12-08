<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InfoSeeText extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function infoSeeText()
    {
        $response = $this->get('/info');

        $response->assertSeeText('Информация');
    }
}
