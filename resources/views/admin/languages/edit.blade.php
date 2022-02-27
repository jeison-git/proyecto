@extends('adminlte::page')

@section('title', 'Languages')

@section('content_header')
    <h1>Actualizar idioma</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-primary">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($language, ['route' => ['admin.languages.update', $language], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Idioma') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el idioma ...']) !!}

                @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror

            </div>
        {!! Form::submit('Actualizar idioma', ['class' => 'btn btn-primary btn-sm']) !!}
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
