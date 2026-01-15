<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function showAllPizzas()
    {
        $pizzas = Pizza::with("ingredientes")->get();
        return view('pizzas.showAllPizza', compact('pizzas'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view('pizzas.create', compact('ingredientes'));
    }

    public function showOnePizza($id)
    {
        $pizza = pizza::findOrFail($id);
        $ingredientes = pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.showOnePizza', compact('pizza'));
    }

    public function createPizza()
    {
        return view('pizzas.createPizza');
    }

    public function updatePizza($id)
    {
        $pizza = pizza::findOrFail($id);
        $ingredientes = pizza::with('ingredientes')->findOrFail($id);
        return view('pizzas.editPizza', compact('pizza'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required',
                'descripcion' => 'required',
                'precio' => 'required|numeric',
                'ingredientes' => 'required|array'
            ],

            [
                'nombre.required' => 'El nombre es obligatorio',
                'descripcion.required' => 'La descripción es obligatoria',
                'precio.required' => 'El precio es obligatorio',
                'precio.numeric' => 'El precio debe ser numérico',
                'ingredientes.required' => 'Debes seleccionar al menos un ingrediente',
                'ingredientes.array' => 'Los ingredientes son obligatorios'
            ]

        );

        $pizza = Pizza::create($request->only([
            'nombre',
            'descripcion',
            'precio'
        ]));

        if ($request->has('ingredientes')) {
            $pizza->ingredientes()->attach($request->ingredientes);
        }
        return redirect()->route("pizzas.index");
    }


    public function edit($id)
    {
        $pizza = Pizza::with('ingredientes')->findOrFail($id);
        $ingredientes = Ingrediente::all();

        return view('pizzas.edit', compact('pizza', 'ingredientes'));
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'nombre' => 'required',
                'descripcion' => 'required',
                'precio' => 'required|numeric',
                'ingredientes' => 'required|array'
            ],

            [
                'nombre.required' => 'El nombre es obligatorio',
                'descripcion.required' => 'La descripción es obligatoria',
                'precio.required' => 'El precio es obligatorio',
                'precio.numeric' => 'El precio debe ser numérico',
                'ingredientes.required' => 'Debes seleccionar al menos un ingrediente',
                'ingredientes.array' => 'Los ingredientes son obligatorios'
            ]

        );

        $pizza = Pizza::findorfail($id);

        $pizza->update($request->only([
            'nombre',
            'descripcion',
            'precio'
        ]));

        $pizza->ingredientes()->sync(
            $request->ingredientes ?? []
        );

        return redirect()->route('pizzas.showAllPizzas');

    }

    public function confirmDelete(Pizza $pizza){
        return view('pizzas.confirmDelete', compact('pizza'));
    }

    public function destroy(Pizza $pizza){
        
    $pizza->delete();

        return redirect()
        ->route('pizzas.showAllPizzas')
        ->with('success', 'Pizza eliminada correctamente');
    }
}
