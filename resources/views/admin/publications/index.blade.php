@extends('adminlte::page')

@section('title', 'BiDigital')

@section('content_header')
    <h1>Publicaciones por aprobar</h1>
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
                        <th>Name</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($publications as $publication)
                       <tr>

                        <td>{{$publication->id}}</td>
                        <td>{{$publication->title}}</td>
                        <td>{{$publication->category_publication->name}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.publications.show', $publication)}}">Revisar</a>
                        </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">{{-- publicar las rutas de paginacion de bootstr /\ php artisan vendor:publish --tag=laravel-pagination --}}
            {{$publications->links('vendor.pagination.bootstrap-4')}}
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
