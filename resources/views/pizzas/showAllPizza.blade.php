<table>
    <tr>
        <th></th>
        <th></th>
    </tr>
@foreach ($pizzas as $pizza)
    <tr>
        <td>{{$pizza->nombre}}</td>
        <td></td>
    </tr>
@endforeach    
</table>