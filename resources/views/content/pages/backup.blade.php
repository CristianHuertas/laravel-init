@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Backups')

@section('content')
    <h4>Recuperacion De Informacion</h4>
    {{-- {{ $users }} --}}
    <div class="card">
        <div class="table-responsive text-nowrap">
            <a class="btn btn-secondary" href="{{ route('pages-backups-create') }}">Añadir Copia de seguridad</a>

            <table class="table table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Creado en</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($backups as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}</td>


                            <td>
                                <a href="{{ $item->url }}">Dowload</a> | <a
                                    href="{{ route('pages-backups-delete', $item->id) }}">Elimninar</a>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>




@endsection
