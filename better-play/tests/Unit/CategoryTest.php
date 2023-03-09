<?php

namespace Tests\BetterPlay\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_access_root_url(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}