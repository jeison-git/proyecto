@extends('adminlte::page')

@section('title', 'Languages')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.languages.create')}}">Agregar nuevo idioma</a>
    <h1>Lista de idiomas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-primary">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($languages as $language)
                        <tr>
                            <td>
                                {{$language->id}}
                            </td>
                            <td>
                                {{$language->name}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.languages.edit', $language)}}">Editar</a>
                            </td>

                            <td width="10px">
                              <form action="{{route('admin.languages.destroy', $language)}}" method="POST">
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
