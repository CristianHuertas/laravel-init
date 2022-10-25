@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tipos')

@section('content')
    <h4>Tipos de dispositivos</h4>
    {{-- {{ $users }} --}}
    <div class="card">
        <div class="table-responsive text-nowrap">
            <a class="btn btn-secondary" href="{{ route('pages-types-create') }}">Añadir Dispositivo</a>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Creado en</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($types as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->active)
                                    <a href="{{ route('pages-types-switch', $item->id) }}">
                                    <span class="badge bg-success">Activo</span></a>
                                @else
                                    <a href="{{ route('pages-types-switch', $item->id) }}">
                                    <span class="badge bg-danger">Inactivo</span></a>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="{{ route('pages-types-show', $item->id) }}">Editar</a> | <a
                                    href="{{ route('pages-types-destroy', $item->id) }}">Elimninar</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>




@endsection
