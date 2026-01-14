<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::get('/', [PizzaController::class, 'showAllPizzas'])
    ->name('pizzas.showAllPizzas');

Route::get('/pizza/{id}', [PizzaController::class, 'showOnePizza'])
    ->name('pizzas.showOnePizza');

Route::get('/crearpizza', [PizzaController::class, 'createPizza'])
    ->name('pizzas.createPizza');

Route::post('/pizzas', [PizzaController::class, 'store'])
    ->name('pizzas.store');    

Route::get('/actualizapizza/{id}', [PizzaController::class, 'updatePizza'])
    ->name('pizzas.updatePizza');    