<?php

namespace Database\Factories;

use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Events::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_uz' => $this->faker->title,
            'title_ru' => $this->faker->title,
            'about_uz' => $this->faker->text,
            'about_ru' => $this->faker->text,
            'image' => 'media/' . $this->faker->image('public/media/',640,480, null, false),
            'begin_date' => now(),
            'status' => 1,
//            'remember_token' => Str::random(10),
        ];
    }
}

