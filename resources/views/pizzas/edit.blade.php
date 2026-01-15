<h1>Editar pizza</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
@endif 

<form action="{{route('pizzas.update', $pizza->id)}}" method="Post">
    @csrf
    ç@method('PUT')

    <input type="text" name="nombre"  value="{{$pizza->nombre}}">

    <textarea name="descripcion">{{ $pizza->descripcion }} </textarea>

    <input type="number" step="0.01" name="precio" value="{{ $pizza->precio }}">

@foreach($ingredientes as $ingrediente)
    <label>
        <input type="checkbox" name="ingredientes[]" value="{{ $ingrediente->id }}" {{ $pizza->ingredientes->contains($ingrediente->id) ? 'checked' : '' }}>
    </label><br>
    @endforeach

    <button type="submit">Editar</button>
    
