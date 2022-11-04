<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Descripcion</th>
        <th>Creado</th>
        <th>Stock</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->stock }}</td>


        </tr>
    @endforeach
    </tbody>

    
</table>