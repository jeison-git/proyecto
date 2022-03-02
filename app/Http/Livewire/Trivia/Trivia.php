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
        $quizzes = Quiz::where('status', 'PUBLICADO')->where(function ($query) {
            $query->whereNull('finished_at')->orWhere('finished_at', '>', now());
        })->withCount('questions')->paginate(5);

        return view('livewire.trivia.trivia', compact('quizzes'));
    }
}
