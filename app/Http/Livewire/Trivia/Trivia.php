<?php

namespace App\Http\Livewire\Trivia;

use Livewire\Component;
use App\Models\Quiz;
use Livewire\WithPagination;

class Trivia extends Component
{
    /* use WithPagination; */

    public function render()
    {
        if (auth()->user()) {

            $quizzes = Quiz::where('status', 'PUBLICADO')->where(function ($query) {
                $query->whereNull('finished_at')->orWhere('finished_at', '>', now());
            })->withCount('questions')->inRandomOrder()->paginate(40);

            $results = auth()->user()->results;

            return view('livewire.trivia.trivia', compact('quizzes', 'results'));
        } else {

            $quizzes = Quiz::where('status', 'PUBLICADO')->where(function ($query) {
                $query->whereNull('finished_at')->orWhere('finished_at', '>', now());
            })->withCount('questions')->inRandomOrder()->paginate(40);

            return view('livewire.trivia.trivia', compact('quizzes'));
        }
    }
}
