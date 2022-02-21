<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{ 
    use AuthorizesRequests;

    public $course, $current, $quiz, $myResult, $question;

    public function mount(Course $course){
        $this->course = $course;

        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;
                break;
            }
        }

        if(!$this->current){
            $this->current = $course->lessons->last();
        }
        
        $this->authorize('enrolled', $course);
    }

    public function render(){

        return view('livewire.course-status');
    }

    /////////métodos////////

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        
    }
    public function completed(){
        if($this->current->completed){
            //eliminar
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //agregar
            $this->current->users()->attach(auth()->user()->id);
        }

        $this->current = Lesson::find($this->current->id);
        $this->course  = Course::find($this->course->id);
    }

    /////////propiedades computadas////////

    public function getIndexProperty(){ //propiedad computada index
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }
    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

    ////////////barra de progreso////////////////

    public function getAdvanceProperty(){
        $i = 0;

        foreach ($this->course->lessons as $lesson){
            if($lesson->completed){
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());
            return round($advance, 2);
    }

    public function download(){
        return response()->download(storage_path('app/' . $this->current->resource->url));
    }

    //\\test//\\
    public function result() { 
        $this->current = Lesson::find($this->current->id);
        $this->correct_point = 0;
        $this->wrong_point = 0;
        $this->point = 0;        
 
         /*if ($quiz->myResult) {
             abort(404, 'You have participated before!');
         }*/

         foreach($this->current->quiz->questions as $question) {

            

            Answer::create([
                 'user_id'    => auth()->user()->id,
                 'question_id'=> $question->id,
                 'answer'     => $question->id

             ]);
 
             /*if($question->correct_answer === $question->id) {
                 $this->correct_point += 1;
             }*/
         }
 
         /*$this->point = round((100 / count($this->current->quiz->questions)) * $this->correct_point);
         $this->wrong_point = count($this->current->quiz->questions) - $this->correct_point;

         Result::create([
             'user_id' => auth()->user()->id,
             'quiz_id' => $this->current->quiz->id,
             'point'   => $this->point,
             'correct_answer' => $this->correct_point,
             'wrong_answer'   => $this->wrong_point

         ]);*/

         //$this->question = Question::find($this->question->id);
         //$this->current = Lesson::find($this->current->id);
         //return redirect()->route('quiz.detail', $quiz->slug)->withSuccess("You've completed the quiz, your score is: " . $this->point);
         //return dd();
    }

}
