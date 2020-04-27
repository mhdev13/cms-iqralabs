<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function it_store_data()
    {
        //Membuat objek user yang otomatis menambahkannya ke database.
        $user = factory(User::class)->create();

        //Acting as berfungsi sebagai autentikasi, jika kita menghilangkannya maka akan error.
        $response = $this->actingAs($user)
        //Hit post ke method store, fungsinya ya akan lari ke fungsi store.
        ->post(route('user.store'), [
        //isi parameter sesuai kebutuhan request
        'ic' => $this->faker->randomNumber(3),
        'user_name' => $this->faker->words(3, true),
        'join_date' =>  $this->$faker->dateTimeBetween('now', '+01 days'),
        'group' => $this->faker->words(1, true),
        'image' => $this->faker->image('public/storage/images',640,480, null, false),

        ]);

        //Tuntutan status 302, yang berarti redirect status code.
        $response->assertStatus(302);

        //Tuntutan bahwa abis melakukan POST URL akan dialihkan ke URL user atau routenya adalah user.index
        $response->assertRedirect(route('user.index'));
    
    }
}
