<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Auth;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
    public function index_method_returns_all_cart()
    {
        $product1 = Product::factory()->create([
            'id' => '1'
        ]);
        $product2 = Product::factory()->create([
            'id' => '2'
        ]);

        $user = User::factory()->create([
            'id' => '1',
            'password' => bcrypt($password = 'secret')
        ]);
        $response = $this->call('POST','/login',[
          'email' => $user->email,
          'password' => $password
        ]);

        $cart1 = Cart::factory()->create([
            'id' => '1',
            'product_id' => $product1->id,
            'user_id' => $user->id
        ]);
        $cart2 = Cart::factory()->create([
            'id' => '2',
            'product_id' => $product2->id,
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->call('GET','/cart/'.$user->id);

        $response->assertSee($product1->name)
                 ->assertSee($product1->price);
        $response->assertSee($product2->name)
                 ->assertSee($product2->price);
    }
    /**
    * @test
    */
    public function store_method_store_a_cart()
    {
        $product1 = Product::factory()->create([
            'id' => '1'
        ]);

        $user = User::factory()->create([
            'id' => '1',
            'password' => bcrypt($password = 'secret')
        ]);
        $response = $this->call('POST','/login',[
          'email' => $user->email,
          'password' => $password
        ]);

        $this->actingAs($user)->get('/cart/store/'.$product1->id.'/'.$user->id);

        $this->assertDatabaseHas('carts', [
            'user_id' => $user->id,
            'product_id' => $product1->id
        ]);
    }
    /**
    * @test
    */
    public function delete_method_deletes_a_cart()
    {
        $product1 = Product::factory()->create([
            'id' => '1'
        ]);
        $user = User::factory()->create([
            'id' => '1',
            'password' => bcrypt($password = 'secret')
        ]);
        $response = $this->call('POST','/login',[
          'email' => $user->email,
          'password' => $password
        ]);
        $cart1 = Cart::factory()->create([
            'id' => '1',
            'user_id' => $user->id,
            'product_id' => $product1->id
        ]);

        $this->call('GET','/cart/delete/'.$cart1->id);
        $this->assertDatabaseMissing('carts', [
            'id' => '1'
        ]);
    }
}
