@extends('adminlte::page')

@section('title', 'Cuestionarios-Trivia')

@section('content_header')
    <h2 class="text-base">CUESTIONARIOS O TRIVIAS</h2>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-primary shadow-lg" role="alert">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right">
                <a href="{{ route('admin.trivia.quizzes.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Agregar trivia
                </a>
            </h5>
            <form action="" method="GET">
                <div class="form-row">
                    <div class="col-md-3 col-sm-3">
                        <input type="text" name="title" value="{{ request()->get('title') }}"
                            placeholder="Titúlo de la trivia" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="status" onchange="this.form.submit()" class="form-control">
                            <option @if (request()->get('status') === '') selected @endif value="">Seleccione para buscar
                            </option>
                            <option @if (request()->get('status') === 'PUBLICADO') selected @endif value="PUBLICADO">Publicado</option>
                            <option @if (request()->get('status') === 'BORRADOR') selected @endif value="BORRADOR">Borrador</option>
                            <option @if (request()->get('status') === 'REVISION') selected @endif value="REVISION">Revisión</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-3 col-sm-3">
                            <a href="{{ route('admin.trivia.quizzes.index') }}" class="btn btn-light">Limpiar filtro</a>
                        </div>
                    @endif
                </div>
            </form>
            <div class=" table-responsive">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Trivia / Cuestionario</th>
                            <th scope="col">Numero de preguntas</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th colspan="4" class="text-center">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td scope="row">{{ $quiz->title }}</td>
                                <td scope="row" class="text-center">{{ $quiz->questions_count }}</td>
                                <td scope="row" class="text-center">
                                    @switch($quiz->status)
                                        @case('BORRADOR')
                                            <span class="badge badge-warning text-white">{{ $quiz->status }}</span>
                                        @break

                                        @case('PUBLICADO')
                                            @if (!$quiz->finished_at)
                                                <span class="badge badge-success">{{ $quiz->status }}</span>
                                            @elseif($quiz->finished_at > now())
                                                <span class="badge badge-success">{{ $quiz->status }}</span>
                                            @else
                                                <span class="badge badge-success">Trivia caducada</span>
                                            @endif
                                        @break

                                        @case('REVISION')
                                            <span class="badge badge-danger">{{ $quiz->status }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td scope="row" class="text-center">
                                    <span
                                        title="{{ $quiz->finished_at ? $quiz->finished_at->format('d.m.Y, H:i') : 'Sin límite de tiempo' }}">
                                        {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : 'Sin límite de tiempo' }}
                                    </span>
                                </td>

                                <td width="10px">
                                    <a href="{{ route('admin.trivia.quizzes.details', $quiz->id) }}"
                                        class="btn btn-sm btn-secondary text-white" width="10px">
                                        <i class="fa fa-info-circle"> Detalles</i>
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('admin.trivia.questions.index', $quiz->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fa fa-question"> Preguntas</i>
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('admin.trivia.quizzes.edit', $quiz->id) }}"
                                        class="btn btn-sm btn-primary text-white">
                                        <i class="fa fa-pen"> Editar</i>
                                    </a>
                                </td>
                                {{-- <a href="{{ route('admin.trivia.quizzes.destroy', $quiz) }}" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>
                            </a> --}}
                                <td width="10px">
                                    <form action="{{ route('admin.trivia.quizzes.destroy', $quiz) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit"><i class=" fa fa-times">
                                                Eliminar</i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $quizzes->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
