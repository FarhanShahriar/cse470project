<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use Auth;

class HomeControllerTest extends TestCase
{
  use RefreshDatabase;
  /**
  * @test
  */
  public function index_method_shows_all_info()
  {
      $product1 = Product::factory()->create([
          'id' => '1'
      ]);
      $product2 = Product::factory()->create([
          'id' => '2'
      ]);

      $category1 = Category::factory()->create([
          'id' => '1'
      ]);
      $category2 = Category::factory()->create([
          'id' => '2'
      ]);

      $blog1 = Blog::factory()->create([
          'id' => '1'
      ]);
      $blog2 = Blog::factory()->create([
          'id' => '2'
      ]);

      $response = $this->call('GET','/');

      $response->assertSee($product1->name)
               ->assertSee($product1->price);
      $response->assertSee($product2->name)
               ->assertSee($product2->price);
      $response->assertSee($category1->name);
      $response->assertSee($category2->name);
      $response->assertSee($blog1->name)
               ->assertSee($blog1->author);
      $response->assertSee($blog2->name)
               ->assertSee($blog2->author);
  }
}
