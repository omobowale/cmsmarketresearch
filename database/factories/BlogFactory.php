<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //return [
            'title' => $this->faker->name,
            'short_introduction' => Str::random(5),
            'content' => Str::random(50),
            'blog_category_id' => $this->faker->numberBetween(1, 3),
            'image_path' => "notavailable",
            'slug' => Str::random(30), // password
            'meta_title' => Str::random(8),
            'meta_description' => Str::random(20),
        ];
    }
}
