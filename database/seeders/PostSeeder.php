<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Post::factory(10)->create();
    // Post::factory(10)->pulished()->create(); // generisi postove tako da svaki ima is_published == true
  }
}
