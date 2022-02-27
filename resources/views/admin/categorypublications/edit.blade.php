@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Actualizar detalles de categorias</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-primary">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categorypublications.update', $category], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria ...']) !!}

                @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror

            </div>
        {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary btn-sm']) !!}
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
