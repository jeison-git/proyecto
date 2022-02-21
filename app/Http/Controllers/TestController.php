<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class TestController extends Controller
{
    public function result(Request $request) {
        $quiz = Quiz::with('questions')->first() ?? abort(404, 'Quiz doesnt exist');
         $correct_point = 0;
         $wrong_point = 0;
         $point = 0;

         /*if ($quiz->myResult) {
             abort(404, 'You have participated before!');
         }*/

        /*  foreach($quiz->questions as $question) { */

            Answer::create([
                 'user_id'=>auth()->user()->id,
                 'question_id'=>$quiz->questions->id,
                 'answer'=>$request->post($quiz->questions->id)

             ]);

             if($quiz->questions->correct_answer === $request->post($quiz->questions->id)) {
                 $correct_point += 1;
             }
         /* } */


            $point = round((100 / count($quiz->questions)) * $correct_point);
            $wrong_point = count($quiz->questions) - $correct_point;

            Result::create([
                'user_id'=>auth()->user()->id,
                'quiz_id'=>$quiz->id,
                'point'=>$point,
                'correct_answer'=>$correct_point,
                'wrong_answer'=>$wrong_point

            ]);


         //return redirect()->route('quiz.detail', $quiz->id)->withSuccess("You've completed the quiz, your score is: " . $point);
         return back();

    }
}
