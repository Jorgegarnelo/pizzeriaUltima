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
        $ingresientes = pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.showOnePizza', compact('pizza'));
    }
    
}
