<?php

namespace App\Http\Livewire\Publication;

use Livewire\Component;
use App\Models\Publication;

class Download extends Component
{
    public $publication;

    public function mount(Publication $publication)
    {
        $this->publication = $publication;

        /* $this->authorize('enrolled', $publication); */
    }

    public function render()
    {
        return view('livewire.publication.download');
    }

    public function download()
    {
        return response()->download(storage_path('app/public/' . $this->publication->resource->url));
    }

}
