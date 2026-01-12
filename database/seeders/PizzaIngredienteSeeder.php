<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingrediente; 
use App\Models\Pizza;       

class PizzaIngredienteSeeder extends Seeder
{
    public function run(): void
    {
        
        $pizzaMargarita = Pizza::where('nombre', 'Margarita')->first();
        $pizzaCuatroQuesos = Pizza::where('nombre', 'Cuatro quesos')->first();
        $pizzaPrimavera = Pizza::where('nombre', 'Primavera')->first();

        $mozzarella = Ingrediente::where('nombre', 'Mozzarella')->first();
        $Parmesamo = Ingrediente::where('nombre', 'Parmesano')->first();
        $Gorgonzola = Ingrediente::where('nombre', 'Gorgonzola')->first();
        $Provolone = Ingrediente::where('nombre', 'Provolone')->first();
        $Tomate = Ingrediente::where('nombre', 'Tomate')->first();
        $Rucula = Ingrediente::where('nombre', 'Rúcula')->first();

      
        $pizzaMargarita->ingredientes()->attach([$Tomate->id, $mozzarella->id]);
        $pizzaCuatroQuesos->ingredientes()->attach([$mozzarella->id, $Parmesamo->id, $Gorgonzola->id, $Provolone->id]);
        $pizzaPrimavera->ingredientes()->attach([$Tomate->id, $mozzarella->id, $Rucula->id]);
    }
}
