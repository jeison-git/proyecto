<x-app-layout>

    <div class="container card">
        <div class="card-body">
                <form method="POST" action="{{ route('quiz.result', $quiz->id) }}">
                    @csrf
                    @foreach ($quiz->questions as $question)
                        @if($question->image)
                            <img src="{{ asset($question->image) }}" width="40%" class="img-responsive rounded mb-2 mt-2">
                        @endif
                        <strong>
                            Preguntas {{ $loop->iteration }}: 
                        </strong>
                        {{ $question->name }}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}1" value="answer_1">
                            <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer_1 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}2" value="answer_2">
                            <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer_2 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}3" value="answer_3">
                            <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer_3 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $question->id }}" id="quiz{{ $question->id }}4" value="answer_4">
                            <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer_4 }}
                            </label>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                    <button class="btn btn-success btn-sm btn-block mt-3">Termina el test</button>
                </form>
        </div>
    </div>

</x-app-layout>