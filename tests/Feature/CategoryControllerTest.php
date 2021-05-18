<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Auth;

class CategoryControllerTest extends TestCase
{
  use RefreshDatabase;
  /**
  * @test
  */
  public function showslug_method_return_full_details()
  {
      $category1 = Category::factory()->create([
          'id' => '1',
          'slug' => 'abcd'
      ]);

      $product1 = Product::factory()->create([
          'id' => '1',
          'slug' => 'abcd'
      ]);

      $this->call('POST','/submitcategory',[$category1]);

      $response = $this->call('GET','/category/'.$category1->slug);
      // dd($response);
      $response->assertSee($product1->name)
               ->assertSee($product1->description);
  }
  /**
  * @test
  */
  public function save_method_saves_a_category()
  {
      $category1 = Category::factory()->create([
          'id' => '1',
      ]);
      $this->call('POST','/submitcategory',[$category1]);

      $this->assertDatabaseHas('categories', [
          'id' => '1',
          'name' => $category1->name
      ]);
  }

  /** @test */
  public function update_method_updates_the_category(){

      $category1 = Category::factory()->create([
          'id' => '1',
      ]);
      $this->call('POST','/submitcategory',[$category1]);

      $data = [
          'name' => 'Farhan Shahriar',
      ];
      // dd($product1);
      $this->call('PUT','/updatecategory/'.$category1->id,$data);
      $this->assertDatabaseHas('categories', [
          'id' => '1',
          'name' => $category1->name
      ]);
  }
}
