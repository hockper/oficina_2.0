<?php

namespace Database\Factories;

use App\Models\Orcamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrcamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orcamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendedor' => $this->faker->name(),
            'cliente' => $this->faker->name(),
            'descricao' => $this->faker->text(),
            'valorOrcado' => $this->faker->randomFloat(2,0,10000)
        ];
    }
}
