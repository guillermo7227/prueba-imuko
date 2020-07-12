@extends('layouts.app', ['title' => 'Editar Ciudad'])
@section('content')
    <div class="container">

        <h1>{{$city->name}}</h1>

        <form action="{{route('cities.update', $city)}}" method="post" style="max-width: 350px">
            @csrf @method('put')

            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{old('name', $city->name)}}"
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
