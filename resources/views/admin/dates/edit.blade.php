@extends('adminlte::page')

@section('title', 'Years')

@section('content_header')
    <h1>Actualizar año de publicación</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-primary">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($date, ['route' => ['admin.dates.update', $date], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Año') !!}
                {!! Form::number('year', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el año ...']) !!}

                @error('year')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror

            </div>
        {!! Form::submit('Actualizar año de publicación', ['class' => 'btn btn-primary btn-sm']) !!}
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
