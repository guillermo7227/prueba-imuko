@extends('layouts.app', ['title' => 'Activar Usuario'])
@section('content')
    <div class="container">

        <h1>Activar Cuenta</h1>
        <p>Hola {{$user->firstName}}. Ingresa una contraseña para activar tu cuenta.</p>

        <form action="{{route('users.perform-activate', $user)}}"
              method="post"
              style="max-width: 350px">
            @csrf @method('put')

            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       value="{{old('password', '')}}"
                       required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Confirmar contraseña</label>
                <input type="password"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation"
                       value="{{old('password_confirmation', '')}}"
                       required>
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">
                <i class="fa fa-check"></i> Activar Cuenta
            </button>

        </form>

    </div>
@endsection
