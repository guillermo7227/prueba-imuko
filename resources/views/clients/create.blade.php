@extends('layouts.app', ['title' => 'Nuevo Cliente'])
@section('content')
    <div class="container">

        <h1>Crear Cliente</h1>

        <form action="{{route('clients.store')}}" method="post" style="max-width: 350px">
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
                <label for="">Ciudad</label>
                <select class="form-control selectpicker @error('city_id') is-invalid @enderror"
                        name="city_id"
                        data-live-search="true"
                        data-style=""
                        data-style-base="form-control"
                        required>
                    @forelse($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @empty
                        <option value="" disable selected>No hay ciudades para mostrar</option>
                    @endforelse
                </select>
            </div>

            <a class="btn btn-secondary" href="{{route('clients.index')}}">
                <i class="fa fa-ban"></i> Cancelar
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i> Guardar
            </button>

        </form>

    </div>
@endsection
