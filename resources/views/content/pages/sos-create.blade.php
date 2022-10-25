@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo S.O')

@section('content')
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
            <h4>Crear Sistema operativo</h4>

            <form class="row g-1" method="POST" action="{{ route('pages-sos-store') }}">

                @csrf

       

                <div class="col-7">
                    <label for="inputAddress" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Android, Windows, Linux..." id="inputAddress"
                        required>
                </div>

                <div class="col-md-7">
                    <label for="inputEmail4" class="form-label">Version Sistema Operativo</label>
                    <input type="text" name="version" class="form-control" id="inputEmail4"
                        placeholder="V 1.0..." required>
                </div>

                <div class="col-md-7">
                    <label for="inputEmail4" class="form-label">Descripcion de Categoria</label>
                    <input type="text" name="description" class="form-control" id="inputEmail4"
                        placeholder="Sistema operativo de..." required>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
