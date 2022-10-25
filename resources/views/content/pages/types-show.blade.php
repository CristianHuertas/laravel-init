@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar tipo')

@section('content')
@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
<script src="{{asset('assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('assets/js/forms-typeahead.js')}}"></script>
@endsection


    <div class="card">
        <div class="col-lg-12">
            <h4>Editar tipo de dispositivo</h4>

            <form class="row g-1" method="POST" action="{{ route('pages-types-update') }}">

                @csrf
                <input type="hidden" name="type_id" value="{{ $types->id }}">
                <div class="col-7">
                    <label for="inputAddress" class="form-label">Nombre</label>
                    <input type="text" value="{{ $types->name }}" name="name" class="form-control" id="inputAddress"
                        required>
                </div>

                <div class="col-md-7">
                    <label for="inputEmail4" class="form-label">Descripcion de Categoria</label>
                    <input type="text" value="{{ $types->description }}" name="description" class="form-control"
                        id="inputEmail4" placeholder="Descripcion de la categoria" required>
                </div>
                <div class="mb-3">{{-- Selector con iconos --}}
                    <label for="selectpickerIcons" class="form-label">Icono</label>

                    <select name="icon" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                        <option value="bx bx-tv" @if ($types->icon == 'bx bx-tv') selected @endif data-icon="bx bx-tv">Monitor</option>
                        <option value="bx bx-laptop" @if ($types->icon == 'bx bx-laptop') selected @endif data-icon="bx bx-laptop">Computador</option>
                        <option value="bx bx-printer" @if ($types->icon == 'bx bx-printer') selected @endif data-icon="bx bx-printer">Impresora</option>
                        <option value="bx bx-mobile" @if ($types->icon == 'bx bx-mobile') selected @endif data-icon="bx bx-mobile">Movil</option>
                        <option value="bx bx-hdd" @if ($types->icon == 'bx bx-hdd') selected @endif data-icon="bx bx-hdd">Router/Switch</option>
                      </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
