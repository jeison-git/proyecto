<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Lesson;
use App\Models\Quiz;

class LessonQuizzes extends Component
{

    public $quiz, $lesson, $name, $description;

    protected $rules =[
        'quiz.name' => 'required',
        'quiz.description' => 'required',
    ];

    public function mount(Lesson $lesson){
        $this->lesson = $lesson;
        if ($lesson->quiz){
            $this->quiz = $lesson->quiz;
        }

    }

    public function render()
    {
        return view('livewire.instructor.lesson-quizzes');
    }

    public function store(){

        $this->quiz = $this->lesson->quiz()->create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset('name', 'description');
        $this->lesson = Lesson::find($this->lesson->id);

    }

    public function update(){
        $this->validate();
        $this->quiz->save();
    }

    public function destroy(Quiz $quiz){
        $this->quiz->delete();
        $this->reset(['name', 'description']);
        $this->lesson = Lesson::find($this->lesson->id);
    }

}
