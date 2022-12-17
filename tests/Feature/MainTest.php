<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MainTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_main()
    {
        //Validate function status code response
        $response = $this->get('/api/zip-codes/20020');
        $response->assertstatus(200);

        //Validate if response contains federal_entity name = AGUASCALIENTES
        $response->assertJson(fn (AssertableJson $json) =>
        $json->where('federal_entity.name', 'AGUASCALIENTES')
            ->etc()
        );

        //Validate exceptions
        $errors = $this->get('/api/zip-codes/999');
        $errors->assertStatus(500);

    }
}
