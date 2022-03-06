@extends('adminlte::page')

@section('title', 'Editar-Trivia')

@section('content_header')
    <h1>ACTUALIZAR LOS CUESTIONARIOS</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary shadow-lg" role="alert">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <h5 class="card-title p-2">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
                Regresar
            </a>
        </h5>
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST" action="{{ route('admin.trivia.quizzes.update', $quiz->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Estado de la trivia</label>
                        <select name="status" class="form-control">
                            <option @if ($quiz->status === 'PUBLICADO') selected @endif
                                @if ($quiz->questions_count < 5) disabled @endif value="PUBLICADO">Publicar</option>
                            <option @if ($quiz->status === 'BORRADOR') selected @endif value="BORRADOR">Borrador</option>
                            <option @if ($quiz->status === 'REVISION') selected @endif value="REVISION">Revisíon</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Titulo de la trivia</label>
                        <input type="text" name="title" value="{{ $quiz->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descripción de la trivia</label>
                        <textarea name="description" class="form-control" rows="4">{{ $quiz->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <input id="isFinished" type="checkbox" @if ($quiz->finished_at) checked @endif>
                        <label>¿Quieres un límite de tiempo para responder el cuestionario?</label>
                    </div>
                    <div @if (!$quiz->finished_at) style="display: none;" @endif id="haveFinished"
                        class="form-group">
                        <label>Fecha de vencimiento</label>
                        <input type="datetime-local" name="finished_at"
                            @if ($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Guardar cambios</button>
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
