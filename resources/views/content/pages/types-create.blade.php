@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Tipo')

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
            <h4>Crear Tipo Nuevo</h4>

            <form class="row g-1" method="POST" action="{{ route('pages-types-store') }}">

                @csrf

                <div class="col-7">
                    <label for="inputAddress" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Monitor..." id="inputAddress"
                        required>
                </div>

                <div class="col-md-7">
                    <label for="inputEmail4" class="form-label">Descripcion de Categoria</label>
                    <input type="text" name="description" class="form-control" id="inputEmail4"
                        placeholder="Categoria de monitores" required>
                </div>
                <div class="mb-3">{{-- Selector con iconos --}}
                    <label for="selectpickerIcons" class="form-label">Icono</label>

                    <select name="icon" class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                        <option value="bx bx-tv" data-icon="bx bx-tv">Monitor</option>
                        <option value="bx bx-laptop" data-icon="bx bx-laptop">Computador</option>
                        <option value="bx bx-printer" data-icon="bx bx-printer">Impresora</option>
                        <option value="bx bx-mobile" data-icon="bx bx-mobile">Movil</option>
                        <option value="bx bx-hdd" data-icon="bx bx-hdd">Router/Switch</option>
                      </select>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
