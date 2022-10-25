@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Usuario')

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
            <h4>Crear Usuario Nuevo</h4>

            <form class="row g-1" method="POST" action="{{ route('pages-users-store') }}">

                @csrf

                <div class="col-10">
                    <label for="inputAddress" class="form-label">Nombre Completo</label>
                    <input type="text" name="name" class="form-control" id="inputAddress" required>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4"
                        placeholder="Correo electronico" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4"
                        placeholder="Secret password" required>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
