@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Nuevo Usuario')

@section('content')
    <div class="card">
        <div class="col-lg-12">
            <h4>Editar Usuario</h4>

            <form class="row g-1" method="POST" action="{{ route('pages-users-update') }}">
            
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="col-10">
                    <label for="inputAddress" class="form-label">Nombre Completo</label>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="inputAddress">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="inputEmail4" placeholder="Correo electronico">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="old_password" class="form-control" id="inputPassword4" placeholder="Password actual">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Nuevo Password</label>
                    <input type="password" name="new_password" class="form-control" id="inputPassword4" placeholder="Password nuevo">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Confirmar Nuevo Password</label>
                    <input type="password" name="new_password_2" class="form-control" id="inputPassword4" placeholder="Confirmar password nuevo">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
