<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Ingrediente; 

class IngredienteSeeder extends Seeder
{
  
    public function run(): void
    {
        Ingrediente::create(['nombre' => 'Mozzarella']);
        Ingrediente::create(['nombre' => 'Parmesano']);
        Ingrediente::create(['nombre' => 'Gorgonzola']);
        Ingrediente::create(['nombre' => 'Provolone']);
        Ingrediente::create(['nombre' => 'Tomate']);
        Ingrediente::create(['nombre' => 'Rúcula']);
    }
}