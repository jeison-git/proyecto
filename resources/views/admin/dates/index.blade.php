@extends('adminlte::page')

@section('title', 'Years')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.dates.create')}}">Nueva fecha de publicación</a>
    <h1>Lista de años</h1>
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
                        <th>Año</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dates as $date)
                        <tr>
                            <td>
                                {{$date->id}}
                            </td>
                            <td>
                                {{$date->year}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.dates.edit', $date)}}">Editar</a>
                            </td>

                            <td width="10px">
                              <form action="{{route('admin.dates.destroy', $date)}}" method="POST">
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
