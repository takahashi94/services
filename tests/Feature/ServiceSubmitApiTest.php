<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Service;
use App\User;

class ServiceSubmitApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * @test
     */
    public function testSubmitService()
    {
        $data = [
            'name' => 'test',
            'price' => 1000,
            'plan' => '月額',
            'billing_date' => '2020-07-21'
        ];

        $response = $this->actingAs($this->user)
            ->json('POST', route('service.create'), $data);

        $response->assertStatus(201);
    }
}
