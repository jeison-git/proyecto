@extends('adminlte::page')

@section('title', 'Cursos CyberUNESR')

@section('content_header')
    <h1>Cursos por aprobar</h1>
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
                        <th>Name</th>
                        <th>Categoria</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $course)
                       <tr>

                        <td>{{$course->id}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->category->name}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.courses.show', $course)}}">Revisar</a>
                        </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
