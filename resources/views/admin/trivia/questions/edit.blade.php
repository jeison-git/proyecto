<x-trivia-layout>
    <x-slot name="header">
        <h5 class="card-title">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i>
                Regresar
            </a>
        </h5>
        Editar pregunta '{{ $question->question }}'
    </x-slot>
    @if (session('info'))
        <div class="alert alert-primary shadow-lg" role="alert">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <form method="POST"
                    action="{{ route('admin.trivia.questions.update', [$question->quiz_id, $question->id]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Pregunta</label>
                        <textarea name="question" class="form-control" rows="4">{{ $question->question }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        @if ($question->image)
                            <a href="{{ asset($question->image) }}" target="_blank">
                                <img src="{{ asset($question->image) }}" class="img-responsive rounded mb-3"
                                    width="350" alt="">
                            </a>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>1. Respuesta</label>
                                <textarea name="answer_1" class="form-control"
                                    rows="4">{{ $question->answer_1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>2. Respuesta</label>
                                <textarea name="answer_2" class="form-control"
                                    rows="4">{{ $question->answer_2 }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>3. Respuesta</label>
                                <textarea name="answer_3" class="form-control"
                                    rows="4">{{ $question->answer_3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>4. Respuesta</label>
                                <textarea name="answer_4" class="form-control"
                                    rows="4">{{ $question->answer_4 }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Respuesta correcta</label>
                        <select name="correct_answer" class="form-control">
                            <option @if ($question->correct_answer === 'answer_1') selected @endif value="answer_1">1. Respuesta
                            </option>
                            <option @if ($question->correct_answer === 'answer_2') selected @endif value="answer_2">2. Respuesta
                            </option>
                            <option @if ($question->correct_answer === 'answer_3') selected @endif value="answer_3">3. Respuesta
                            </option>
                            <option @if ($question->correct_answer === 'answer_4') selected @endif value="answer_4">4. Respuesta
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Actualizar preguntas</button>
                    </div>
                </form>
            </h5>
        </div>
    </div>
</x-trivia-layout>
