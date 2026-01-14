<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function showAllPizzas(){
        $pizzas = Pizza::with("ingredientes")->get();
        return view('pizzas.showAllPizza', compact('pizzas'));
    }

    public function showOnePizza($id){
        $pizza = pizza::findOrFail($id);
        $ingredientes = pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.showOnePizza', compact('pizza'));
    }

    public function createPizza(){
        return view('pizzas.createPizza');
    }
 
    public function updatePizza($id){
        $pizza = pizza::findOrFail($id);
        $ingredientes = pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.editPizza', compact('pizza'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'ingredientes' => 'array'
        ],

        [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripción es obligatoria',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser numérico',
            'ingredientes.array' => 'Los ingredientes son obligatorios',
        ]
        
        );
    }
    
}
