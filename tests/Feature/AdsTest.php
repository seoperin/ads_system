<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdsTest extends TestCase
{
    public function testBasic()
    {
        $response = $this->get('/ad/get');

        $response->assertStatus(200);
    }
}
