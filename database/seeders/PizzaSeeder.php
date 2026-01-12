<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{

    public function run(): void
    {
        Pizza::create(['nombre' => 'Margarita', 'descripcion' => 'la mejor pizza', 'precio' => 10.50]);
        Pizza::create(['nombre' => 'Cuatro quesos', 'descripcion' => 'la segunda mejor pizza', 'precio' => 12.50]);
        Pizza::create(['nombre' => 'Primavera', 'descripcion' => 'la tercera mejor pizza', 'precio' => 14.50]);
    }
}