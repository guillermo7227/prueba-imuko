@extends('layouts.app', ['title' => 'Editar Cliente'])
@section('content')
    <div class="container">

        <h1>{{$client->name}}</h1>

        <form action="{{route('clients.store')}}" method="post" style="max-width: 350px">
            @csrf

            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{old('name', $client->name)}}"
                       required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Ciudad</label>
                <select class="form-control selectpicker @error('city_id') is-invalid @enderror"
                        name="city_id"
                        id="city_id"
                        data-live-search="true"
                        data-style=""
                        data-style-base="form-control"
                        required>
                    @forelse($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @empty
                        <option value="" disabled selected>No hay ciudades para mostrar</option>
                    @endforelse
                </select>
                @error('city_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
@push('js')
    <script>
        $('#city_id').val(@json(old('city_id', $client->city_id)))
    </script>
@endpush
