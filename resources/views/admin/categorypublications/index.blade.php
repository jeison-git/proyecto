@extends('adminlte::page')

@section('title', 'Categoria de publicaciones')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.categorypublications.create')}}">Nueva categoría</a>
    <h1>Lista de categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.categorypublications.edit', $category)}}">Editar</a>
                            </td>

                            <td width="10px">
                              <form action="{{route('admin.categorypublications.destroy', $category)}}" method="POST">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop
