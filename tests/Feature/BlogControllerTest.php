<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Blog;
use App\Models\User;
use Auth;

class BlogControllerTest extends TestCase
{
  use RefreshDatabase;

  /**
  * @test
  */
  public function index_method_returns_all_blogs()
  {
      $blog1 = Blog::factory()->create([
          'id' => '1'
      ]);
      $blog2 = Blog::factory()->create([
          'id' => '2'
      ]);
      $blog3 = Blog::factory()->create([
          'id' => '3'
      ]);

      $response = $this->call('GET','/blog');

      $response->assertSee($blog1->title)
               ->assertSee($blog1->author);
      $response->assertSee($blog2->title)
               ->assertSee($blog2->author);
      $response->assertSee($blog3->title)
               ->assertSee($blog3->author);
  }
  /**
  * @test
  */
  public function show_method_return_full_details()
  {
      $blog1 = Blog::factory()->create([
          'id' => '1'
      ]);

      $this->call('POST','/submitblog',[$blog1]);

      $response = $this->call('GET','/blog-single/'.$blog1->id);
      // dd($response);
      $response->assertSee($blog1->title)
               ->assertSee($blog1->author)
               ->assertSee($blog1->description);
  }
  /**
  * @test
  */
  public function save_method_saves_a_blog()
  {
      $blog1 = Blog::factory()->create([
          'id' => '1'
      ]);
      $this->call('POST','/submitblog',[$blog1]);

      $this->assertDatabaseHas('blogs', [
          'id' => '1',
          'title' => $blog1->title
      ]);
  }

  /** @test */
  public function update_method_updates_the_blog(){

      $blog1 = Blog::factory()->create([
          'id' => '1'
      ]);
      $this->call('POST','/submitblog',[$blog1]);

      $data = [
          'title' => 'Farhan Shahriar',
      ];
      // dd($product1);
      $this->call('PUT','/updateblog/'.$blog1->id,$data);
      $this->assertDatabaseHas('blogs', [
          'id' => '1',
          'title' => $blog1->title
      ]);
  }
}
