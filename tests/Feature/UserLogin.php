<?php

namespace Tests\Feature;

use Carbon\Carbon;

use Tests\TestCase;

class UserLogin extends TestCase
{

    protected const END_POINT = 'api/auth/login';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $carbon = new Carbon();
        $datetime = $carbon->timestamp;
        $userAccessToken = '';

        $name = 'test name';
        $email = 'mail-address'.$datetime.'@test.test';
        $password = 'passwordpassword';
        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        $response = $this->json('POST', 'api/users', $params, []);

        $userResponse = json_decode($response->getContent());
        if(property_exists($userResponse, 'access_token')) {
            $userAccessToken = $userResponse->access_token;
        }

        $response->assertStatus(200);
    }
}
