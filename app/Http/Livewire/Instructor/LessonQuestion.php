<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Question;

class LessonQuestion extends Component
{
    public $quiz, $question, $name, $answer_1, $answer_2, $answer_3, $answer_4, $correct_answer;

    protected $rules = [
        'question.name' => 'required',
        'question.answer_1' => 'required',
        'question.answer_2' => 'required',
        'question.answer_3' => 'required',
        'question.answer_4' => 'required',
        'question.correct_answer' => 'required'
    ];

    public function mount(Quiz $quiz){
        $this->quiz = $quiz;
        $this->question = new Question();
    }

    public function render()
    {
        return view('livewire.instructor.lesson-question');
    }

    public function store(){
        $rules = [
        'name' => 'required',
        'answer_1' => 'required',
        'answer_2' => 'required',
        'answer_3' => 'required',
        'answer_4' => 'required',
        'correct_answer' => 'required'
        ];      
        
        $this->validate($rules);

        Question::create([
            'name' => $this->name,
            'answer_1' => $this->answer_1,
            'answer_2' => $this->answer_2,
            'answer_3' => $this->answer_3,
            'answer_4' => $this->answer_4,
            'correct_answer' => $this->correct_answer,
            'quiz_id' => $this->quiz->id 
        ]);

        $this->reset(['name', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer']);

        $this->quiz = Quiz::find($this->quiz->id);        
    }

    public function edit(Question $question){
        $this->resetValidation();
        $this->question = $question;
    }

    public function update(){
        
        $this->validate();

        $this->question->save();
        $this->question = new Question();

        $this->quiz = Quiz::find($this->quiz->id);
    }

    public function destroy(Question $question){
        $question->delete();
        $this->quiz = Quiz::find($this->quiz->id);
    }

    public function cancel(){
        $this->question = new Question();
    }
    
}
