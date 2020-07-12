@extends('layouts.app', ['title' => 'Usuarios'])
@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Usuarios</h1>
            <a class="btn btn-primary" href="{{route('users.create')}}">
                <i class="fa fa-plus"></i> Nuevo Usuario
            </a>
        </div>

        <div style="overflow-x: scroll" class="mb-3">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th style="width: 20%">Acciones</th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('users.edit', $user)}}"
                                   class="btn btn-sm btn-outline-dark mt-1"
                                   title="Editar">
                                    <i class="fa fa-sm fa-edit"></i> Editar
                                </a>
                                <button class="btn btn-sm btn-outline-danger mt-1"
                                        title="Eliminar"
                                        onclick="if(confirm('¿Desea eliminar este registro?')) $('#destroy-{{$user->id}}').submit()">
                                    <i class="fa fa-sm fa-trash"></i> Eliminar
                                </button>
                                <form action="{{route('users.destroy', $user)}}"
                                      method="post"
                                      id="destroy-{{$user->id}}">
                                    @csrf @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay usuarios para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{$users->links()}}
        </div>
    </div>
@endsection
