@extends('adminlte::page')

@section('title', 'Years')

@section('content_header')
    <h1>Añadir nuevo año</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.dates.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Año') !!}
                    {!! Form::number('year', 'value', ['class' => 'form-control', 'placeholder' => 'Ingrese el año ...']) !!}

                    @error('year')
                    <span class="text-danger text-sm">{{$message}}</span>
                    @enderror

                </div>
            {!! Form::submit('añadir año', ['class' => 'btn btn-primary btn-sm']) !!}
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
