<h1>Eliminar Pizza</h1>

<p>
    ¿Estas seguro que desead borra la pizza?
    <strong>{{ $pizza->nombre}}</strong>
</p>

<form action="{{ route('pizzas.destroy', $pizza)}}">
    @csrf
    @method('DELETE')

    <button type="submit"> Sí, eliminar</button>
    <a href="{{ route('pizzas.showAllPizzas'}}">Cancelar</a>
</form>