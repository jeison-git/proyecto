@extends('adminlte::page')

@section('title', 'Crear Asignatura')

@section('content_header')
    <h1>Añadir Asignatura</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria ...']) !!}

                    @error('name')
                    <span class="text-danger text-sm">{{$message}}</span>
                    @enderror

                </div>
            {!! Form::submit('Añadir Asignatura', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
