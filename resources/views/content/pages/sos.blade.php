@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Sistemas Operativos')

@section('content')
    <h4>Sistemas Operativos</h4>
    {{-- {{ $users }} --}}
    <div class="card">
        <div class="table-responsive text-nowrap">
            <a class="btn btn-secondary" href="{{ route('pages-sos-create') }}">Añadir Sistema operativo</a>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Version</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Creado en</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($sos as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->version }}</td>

                            <td>
                                @if ($item->active)
                                    <a href="{{ route('pages-sos-switch', $item->id) }}">
                                    <span class="badge bg-success">Activo</span></a>
                                @else
                                    <a href="{{ route('pages-sos-switch', $item->id) }}">
                                    <span class="badge bg-danger">Inactivo</span></a>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="{{ route('pages-sos-show', $item->id) }}">Editar</a> | <a
                                    href="{{ route('pages-sos-destroy', $item->id) }}">Elimninar</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>




@endsection
