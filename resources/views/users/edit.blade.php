@extends('layouts.app', ['title' => 'Editar Usurio'])
@section('content')
    <div class="container">

        <h1>{{$user->name}}</h1>

        <form action="{{route('users.update', $user)}}" method="post" style="max-width: 350px">
            @csrf @method('put')

            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{old('name', $user->name)}}"
                       required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       value="{{old('email', $user->email)}}"
                       required>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password"
                       value="">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Confirmar contraseña</label>
                <input type="password"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation"
                       value="">
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <a class="btn btn-secondary" href="{{route('users.index')}}">
                <i class="fa fa-ban"></i> Cancelar
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Guardar
            </button>

        </form>

    </div>
@endsection

