


<h1>Nueva Pizza</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    

<form action="{{ route('pizzas.store') }}" method="POST">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre de la pizza" value="{{ old('nombre') }}">

    <textarea name="descripcion" placeholder="Descripción">{{ old('descripcion') }}</textarea>

    <input type="number" step="0.01" name="precio" placeholder="Precio" value="{{ old('precio') }}">

    <h3>Ingredientes</h3>

    @foreach($ingredientes as $ingrediente)
    <label>
        <input type="checkbox" name="ingredientes[]" value="{{ $ingrediente->id }}" 
            {{ in_array($ingrediente->id, old('ingredientes', [])) ? 'checked' : '' }}>
        {{ $ingrediente->nombre }} </label><br>
    @endforeach

    <br>
    <button type="submit">Guardar Pizza</button>
</form>