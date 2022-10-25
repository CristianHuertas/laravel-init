@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Editar S.O')

@section('content')
    <div class="card">
        <div class="col-lg-12">
            <h4>Editar Sistema Operativo</h4>

            <form class="row g-1" method="POST" action="{{ route('pages-sos-update') }}">

                @csrf
                <input type="hidden" name="sos_id" value="{{ $sos->id }}">
                <div class="col-7">
                    <label for="inputAddress" class="form-label">Nombre</label>
                    <input type="text" value="{{ $sos->name }}" name="name" class="form-control" id="inputAddress"
                        required>
                </div>

                <div class="col-md-7">
                    <label for="inputEmail4" class="form-label">Descripcion de Categoria</label>
                    <input type="text" value="{{ $sos->version }}" name="version" class="form-control"
                        id="inputEmail4" placeholder="Version del sistema operativo" required>
                </div>

                <div class="col-md-7">
                    <label for="inputEmail4" class="form-label">Descripcion de Categoria</label>
                    <input type="text" value="{{ $sos->description }}" name="description" class="form-control"
                        id="inputEmail4" placeholder="Description del sistema operativo" required>
                </div>
              

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
