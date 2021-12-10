<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_countries()
    {
        $response = $this->get('/api/countries');

        $response->assertStatus(200);
    }

    public function test_contacts()
    {
        $response = $this->get('/api/contacts');

        $response->assertStatus(200);
    }

}

