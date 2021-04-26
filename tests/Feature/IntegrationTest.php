<?php

namespace Tests\Feature;

use Tests\TestCase;

use function var_dump;

class IntegrationTest extends TestCase
{
    public function test_response()
    {
        $response = $this->get('/solution');

        $response->assertOk();
        $this->assertArrayHasKey('longest_user_monologue', $response->json());
        $this->assertArrayHasKey('longest_customer_monologue', $response->json());
        $this->assertArrayHasKey('user_talk_percentage', $response->json());
        $this->assertArrayHasKey('user', $response->json());
        $this->assertArrayHasKey('customer', $response->json());
    }
}
