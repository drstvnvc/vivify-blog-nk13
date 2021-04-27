<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Post::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'title' => Str::random(10),
      'body' => $this->faker->text(),
      'is_published' => $this->faker->boolean(75),
      'user_id' => User::inRandomOrder()->first()->id
    ];
  }

  public function published()
  {
    return $this->state(function (array $attributes) {
      return [
        'is_published' => true,
      ];
    });
  }
}
