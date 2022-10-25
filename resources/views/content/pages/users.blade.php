@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
    <h4>Usuarios de la aplicacion</h4>
    {{-- {{ $users }} --}}
    <div class="card">
        <div class="table-responsive text-nowrap">
            <a class="btn btn-secondary" href="{{ route('pages-users-create') }}">Crear usuario</a>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Creado en</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="{{ route('pages-users-show', $item->id) }}">Editar</a> | <a href="{{ route('pages-users-destroy', $item->id) }}">Elimninar</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>




@endsection
