@extends('adminlte::page')

@section('title', 'Admin-Trivia')

@section('content_header')
    <h1>AGREGAR TRIVIA O CUESTIONARIO</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary shadow-lg" role="alert">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST" action="{{ route('admin.trivia.quizzes.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Título de la trivia</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descripción de la trivia</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input id="isFinished" type="checkbox" @if (old('finished_at')) checked @endif>
                        <label>¿Quieres un límite de tiempo para responder las trivialidades?</label>
                    </div>
                    <div @if (!old('finished_at')) style="display: none;" @endif id="haveFinished"
                        class="form-group">
                        <label>Fecha de vencimiento</label>
                        <input type="datetime-local" name="finished_at" value="{{ old('finished_at') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Agregar trivia</button>
                    </div>
                </form>
            </h5>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        $('#isFinished').change(function() {
            if ($('#isFinished').is(':checked')) {
                $('#haveFinished').show();
            } else {
                $('#haveFinished').hide();
            }
        })
    </script>

    <script>
        console.log('Hi!');
    </script>
@stop
