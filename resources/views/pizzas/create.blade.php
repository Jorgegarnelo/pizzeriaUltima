


<h1>Nueva Pizza</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
@endif    

<form action="{{route('pizzas.store')}}" method="Post">
    @csrf

    <input type="text" name="nombre" placeholder="nombre" value="{{old('nombre')}}">

    <textarea name="descripcion">{{old('descripcion')}} </textarea>

    <input type="number" step="0.01" name="precio">

    <h3>Ingredientes</h3>

    @foreach($ingredientes as $ingrediente)
    <label>
        <input type="checkbox" name="ingredientes[]" value="{{ $ingrediente->id }}">
    </label><br>
    @endforeach

    <button type="submit"></button>





</form>