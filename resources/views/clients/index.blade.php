@extends('layouts.app', ['title' => 'Clientes'])
@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Clientes</h1>
            <a class="btn btn-primary" href="{{route('clients.create')}}">
                <i class="fa fa-plus"></i> Nuevo Cliente
            </a>
        </div>

        <div style="overflow-x: scroll" class="mb-3">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>
                        Ciudad
                        <a href="javascript:void(0)"
                           title="Filtrar registros por Ciudad"
                           data-toggle="modal"
                           data-target="#filterModal">
                            <i class="fa fa-filter"></i>
                        </a>
                    </th>
                    <th style="width: 20%">Acciones</th>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->city->name ?? '-'}}</td>
                            <td>
                                <a href="{{route('clients.edit', $client)}}"
                                   class="btn btn-sm btn-outline-dark mt-1"
                                   title="Editar">
                                    <i class="fa fa-sm fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-sm btn-outline-danger mt-1"
                                        title="Eliminar"
                                        onclick="if(confirm('¿Desea eliminar este registro?')) $('#destroy-{{$client->id}}').submit()">
                                    <i class="fa fa-sm fa-trash"></i> Eliminar
                                </button>
                                <form action="{{route('clients.destroy', $client)}}"
                                      method="post"
                                      id="destroy-{{$client->id}}">
                                    @csrf @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay clientes para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{$clients->appends(request()->except('page'))->links()}}
        </div>
    </div>

    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtrar Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Seleccione una Ciudad</label>
                        <select class="form-control selectpicker @error('city_id') is-invalid @enderror"
                                name="city_id"
                                id="city_id"
                                data-live-search="true"
                                data-style=""
                                data-style-base="form-control"
                                required>
                            <option value="">Ver todos los registros</option>
                            @forelse($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @empty
                                <option value="" disable selected>No hay ciudades para mostrar</option>
                            @endforelse
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button"
                            class="btn btn-primary"
                            onclick="window.location = '{{url()->current()}}'+'?city='+$('#city_id').val()">
                        Filtrar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
