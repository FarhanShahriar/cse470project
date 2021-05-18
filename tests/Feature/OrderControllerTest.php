<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Auth;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
    public function index_method_save_a_order()
    {
        $user = User::factory()->create([
            'id' => '1',
            'password' => bcrypt($password = 'secret')
        ]);
        $response = $this->call('POST','/login',[
          'email' => $user->email,
          'password' => $password
        ]);
        $address1 = Address::factory()->create([
            'id' => '1',
            'user_id' => $user->id
        ]);
        $order1 = Order::factory()->create([
            'id' => '1',
            'shipping_id' => $address1->id,
            'user_id' => $user->id
        ]);

        $this->get('/checkout/'.$user->id.'/'.'5000',[$order1]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id
        ]);
    }
}
