<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Auth;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
    public function index_method_returns_all_product()
    {
        $product1 = Product::factory()->create([
            'id' => '1'
        ]);
        $product2 = Product::factory()->create([
            'id' => '2'
        ]);
        $product3 = Product::factory()->create([
            'id' => '3'
        ]);

        $response = $this->call('GET','/shop');

        $response->assertSee($product1->name)
                 ->assertSee($product1->price)
                 ->assertSee($product1->description);
        $response->assertSee($product2->name)
                 ->assertSee($product2->price)
                 ->assertSee($product2->description);
        $response->assertSee($product3->name)
                 ->assertSee($product3->price)
                 ->assertSee($product3->description);
    }
    /**
    * @test
    */
    public function show_method_return_full_details()
    {
        $product1 = Product::factory()->create([
            'id' => '1'
        ]);

        $this->call('POST','/submitproduct',[$product1]);

        $response = $this->call('GET','/product-detail/'.$product1->id);
        // dd($response);
        $response->assertSee($product1->name)
                 ->assertSee($product1->price)
                 ->assertSee($product1->description)
                 ->assertSee($product1->SKU)
                 ->assertSee($product1->height)
                 ->assertSee($product1->width)
                 ->assertSee($product1->weight)
                 ->assertSee($product1->gender)
                 ->assertSee($product1->caret);
    }
    /**
    * @test
    */
    public function save_method_saves_a_product()
    {
        $product1 = Product::factory()->create([
            'id' => '1'
        ]);
        $this->call('POST','/submitproduct',[$product1]);

        $this->assertDatabaseHas('products', [
            'id' => '1',
            'name' => $product1->name
        ]);
    }

    /** @test */
    public function update_method_updates_the_product(){

        $product1 = Product::factory()->create([
            'id' => '1'
        ]);
        $this->call('POST','/submitproduct',[$product1]);

        $data = [
            'name' => 'Farhan Shahriar',
        ];
        // dd($product1);
        $this->call('PUT','/updateproduct/'.$product1->id,$data);
        $this->assertDatabaseHas('products',[
          'id'=> $product1->id ,
          'name' => $product1->name
        ]);
    }
}
