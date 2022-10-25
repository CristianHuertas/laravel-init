@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Dispositivo')

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

<div class="card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-lg-12">
        <h4>Crear Dispositivo Nuevo</h4>

        <form class="row g-1" method="POST" action="{{ route('pages-devices-store') }}">
            @csrf

            <div class="mb-2">{{-- Selector con iconos --}}
                <label for="selectpickerIcons" class="form-label">Tipo de Dispositivo</label>

                <select name="type_id" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                    data-tick-icon="bx-check" data-style="btn-default">
                    @foreach ($types as $item)
                        <option value="{{ $item->id }}" data-icon="{{ $item->icon }}">{{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">{{-- Selector con iconos --}}
                <label for="selectpickerIcons" class="form-label">Tipo de sistema operativo</label>

                <select name="sos_id" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                    data-tick-icon="bx-check" data-style="btn-default">
                    @foreach ($sos as $item2)
                        <option value="{{ $item2->id }}" data-icon="{{ $item2->name }}">{{ $item2->name }}
                            ({{ $item2->version }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6">
                <label for="inputAddress" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" id="inputAddress" required>
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Descripción</label>
                <input type="text" name="description" class="form-control" id="inputEmail4">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Numero de serie</label>
                <input type="text" name="serial_number" class="form-control" id="inputEmail4">
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Mac</label>
                <input type="text" name="mac_address" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Ip</label>
                <input type="text" name="ip_address" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Modelo</label>
                <input type="text" name="model" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Fabrica</label>
                <input type="text" name="manufacturer" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">firmware</label>
                <input type="text" name="firmware" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">stock</label>
                <input type="number" name="stock" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">hdd</label>
                <input type="number" name="hdd" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">ram</label>
                <input type="number" name="ram" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Procesador cpu</label>
                <input type="text" name="cpu" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">tarjeta grafica</label>
                <input type="text" name="gpu" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">slots totales (router/Switch)</label>
                <input type="number" name="total_slots" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">historial</label>
                <input type="text" name="history" class="form-control" id="inputEmail4">
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>

</div>

@endsection
