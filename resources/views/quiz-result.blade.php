<x-app-layout>

    <div class="container card">
        <div class="card-body">
            <div class="alert alert-primary">
                <i class="fa fa-check text-success"> Respuestas correctas</i> |
                <i class="fa fa-square text-danger"> Tus respuestas incorrectas</i>
            </div>
            <div class="alert alert-info">
                <h4>Tu puntaje: {{ $quiz->myResult->point }}</h4>
            </div>
                    @foreach ($quiz->questions as $question)
                        @if($question->correct_answer == $question->myAnswer->answer)
                        <i class="fa fa-check text-success"></i>
                        @else
                        <i class="fa fa-times text-danger"></i>
                        @endif
                        <strong>
                            Pregunta {{ $loop->iteration }}:
                        </strong>
                        {{ $question->question }}
                        <br>
                            <small><strong>{{ $question->true_percent }}%</strong> respondió esta pregunta!</small>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}1">
                            A) {{ $question->answer_1 }}
                            </label>
                            @if('answer_1' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_1' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}2">
                            B) {{ $question->answer_2 }}
                            </label>
                            @if('answer_2' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_2' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}3">
                            C) {{ $question->answer_3 }}
                            </label>
                            @if('answer_3' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_3' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="quiz{{ $question->id }}4">
                            D) {{ $question->answer_4 }}
                            </label>
                            @if('answer_4' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                            @elseif('answer_4' == $question->myAnswer->answer)
                            <i class="fa fa-square text-danger"></i>
                            @endif
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach

        </div>
    </div>

</x-app-layout>