@extends('layouts.app', ['title' => 'Ciudades'])
@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Ciudades</h1>
            <a class="btn btn-primary" href="{{route('cities.create')}}">
                <i class="fa fa-plus"></i> Nueva Ciudad
            </a>
        </div>

        <div style="overflow-x: scroll" class="mb-3">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th style="width: 20%">Acciones</th>
                </thead>
                <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>
                                <a href="{{route('cities.edit', $city)}}"
                                   class="btn btn-sm btn-outline-dark mt-1"
                                   title="Editar">
                                    <i class="fa fa-sm fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-sm btn-outline-danger mt-1"
                                        title="Eliminar"
                                        onclick="if(confirm('¿Desea eliminar este registro?')) $('#destroy-{{$city->id}}').submit()">
                                    <i class="fa fa-sm fa-trash"></i> Eliminar
                                </button>
                                <form action="{{route('cities.destroy', $city)}}"
                                      method="post"
                                      id="destroy-{{$city->id}}">
                                    @csrf @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay ciudades para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{$cities->links()}}
        </div>
    </div>
@endsection
