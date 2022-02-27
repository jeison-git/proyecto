@extends('adminlte::page')

@section('title', 'Languages')

@section('content_header')
    <h1>Añadir nuevo idioma</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.languages.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Idioma') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el idioma que desea agregar...']) !!}

                    @error('name')
                    <span class="text-danger text-sm">{{$message}}</span>
                    @enderror

                </div>
            {!! Form::submit('añadir idioma', ['class' => 'btn btn-primary btn-sm']) !!}
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
