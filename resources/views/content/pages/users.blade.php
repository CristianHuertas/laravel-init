@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Usuarios')

@section('content')
    <h4>Usuarios de la aplicacion</h4>
    {{-- {{ $users }} --}}
    @role('admin')
        {{-- {{ $users_model }} --}}
        <div class="card">
            <div class="table-responsive text-nowrap">
                <a class="btn btn-secondary" href="{{ route('pages-users-create') }}">Crear usuario</a>

                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Admin</th>
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
                                <td>
                                    @foreach ($users_model as $item2)
                                        @if ($item->id == $item2->model_id)
                                            @if ($item2->role_id == 1)
                                                <a href="{{ route('pages-users-switch', $item2->model_id) }}">
                                                    <span class="badge bg-primary">SI</span></a>
                                            @else
                                                <a href="{{ route('pages-users-switch', $item2->model_id) }}">
                                                    <span class="badge bg-success">NO</span></a>
                                            @endif
                                        @endif
                                    @endforeach

                                </td>
                                {{-- <td>{{ $item->hasRole('admin') ? 'Si' : 'No' }}</td> --}}
                                <td>{{ $item->created_at }}</td>
                                <td><a href="{{ route('pages-users-show', $item->id) }}">Editar</a> | <a
                                        href="{{ route('pages-users-destroy', $item->id) }}">Elimninar</a></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">No tienes permisos para ver esta pagina</h5>
                <p class="card-text">Contacta con el administrador</p>
                <a href="{{ route('pages-home') }}" class="btn btn-primary">Volver al inicio</a>
            </div>
        </div>
    @endrole



@endsection
