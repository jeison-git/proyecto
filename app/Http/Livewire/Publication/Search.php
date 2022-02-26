<?php

namespace App\Http\Livewire\Publication;

use Livewire\Component;
use App\Models\Publication;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.publication.search');
    }

    public function getResultsProperty(){
        return Publication::where('title', 'LIKE', '%' . $this->search . '%')->latest('id')->get()->take(6);
    }

}
