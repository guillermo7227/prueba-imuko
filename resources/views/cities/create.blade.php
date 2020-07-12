@extends('layouts.app', ['title' => 'Nueva Ciudad'])
@section('content')
    <div class="container">

        <h1>Crear Ciudad</h1>

        <form action="{{route('cities.store')}}" method="post" style="max-width: 350px">
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

            <a class="btn btn-secondary" href="{{route('cities.index')}}">
                <i class="fa fa-ban"></i> Cancelar
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Guardar
            </button>

        </form>

    </div>
@endsection
