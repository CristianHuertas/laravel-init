@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dispositivos')

@section('content')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bloodhound/bloodhound.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/forms-tagify.js') }}"></script>
    <script src="{{ asset('assets/js/forms-typeahead.js') }}"></script>
@endsection

<h4>Dispositivos</h4>
{{-- {{ $users }} --}}
<div class="card">
    <div class="table-responsive text-nowrap">
        <a class="btn btn-secondary" href="{{ route('pages-devices-create') }}">Añadir Dispositivo</a>

        <table class="table table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Creado en</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($devices as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>@foreach ($type as $item2)
                            @if ($item->tipe_id == $item2->id)
                                <i title="{{ $item2->name }}" class="{{ $item2->icon }}"></i>
                            @endif
                        @endforeach
                    </td>
                        

                <td>
                    @if ($item->active)
                        <a href="{{ route('pages-devices-switch', $item->id) }}">
                            <span class="badge bg-success">Activo</span></a>
                    @else
                        <a href="{{ route('pages-devices-switch', $item->id) }}">
                            <span class="badge bg-danger">Inactivo</span></a>
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td><a href="{{ route('pages-devices-show', $item->id) }}">Editar</a> | <a
                        href="{{ route('pages-devices-destroy', $item->id) }}">Elimninar</a></td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>




@endsection
