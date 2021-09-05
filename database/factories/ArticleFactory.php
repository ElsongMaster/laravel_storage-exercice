<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom"=>$this->faker->text(15),
            "description"=>$this->faker->text(40),
            "date_publication"=>$this->faker->date('Y-m-d'),
            "auteur"=>$this->faker->randomElement($array = array('Camara Laye','Chinua Achebe','Cheikh Hamidou Kane','Aimé Césaire','Eza Boto','Mariama Bâ','Bernard Dadié')),
            "image"=>$this->faker->imageUrl($width = 640, $height = 480),
            
        ];
    }
}
