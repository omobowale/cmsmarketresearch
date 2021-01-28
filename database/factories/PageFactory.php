<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'page_name' => $this->faker->text(12), 
            'page_url' => $this->faker->url(), 
            'page_banner_text' => $this->faker->text(70), 
            'page_button_text' => $this->faker->text(12), 
            'page_button_link'=> $this->faker->url(), 
            'page_meta_description' => $this->faker->text(60), 
            'page_meta_title' => $this->faker->text(40)
        ];
    }
}
