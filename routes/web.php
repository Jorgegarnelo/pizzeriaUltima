<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

Route::get(['/', PizzaController::class, 'showAllPizzas'])->name('pizzas.showAllPizzas');
route::get(['/pizza/{id}', PizzaController::class, 'showOnePizza'])->name('pizzas.showOnePizza');
