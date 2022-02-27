<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Publication;

class PublicationsIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $publications = Publication::where('title', 'LIKE', '%' . $this->search . '%')
                                    ->where('user_id', auth()->user()->id)
                                    ->latest('id')
                                    ->paginate(6);

        return view('livewire.editor.publications-index', compact('publications'));
    }

    public function Limpiar_page(){
        $this->reset('page');
    }

}
