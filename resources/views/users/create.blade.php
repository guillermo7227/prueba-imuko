@extends('layouts.app', ['title' => 'Nuevo Usuario'])
@section('content')
    <div class="container">

        <h1>Crear Usuario</h1>

        <form action="{{route('users.store')}}" method="post" style="max-width: 350px">
            @csrf

            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{old('name', '')}}"
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
                       value="{{old('email', '')}}"
                       required>
                @error('email')
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
