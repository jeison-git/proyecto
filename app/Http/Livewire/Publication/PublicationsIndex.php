<?php

namespace App\Http\Livewire\Publication;

use Livewire\Component;

use App\Models\Publication;
use App\Models\Category_Publication;
use App\Models\Date;
use App\Models\Language;
use Livewire\WithPagination;

class PublicationsIndex extends Component
{
    use WithPagination;

    public $category_publication_id;
    public $language_id;
    public $date_id;

    public function render()
    {
        $categories = Category_Publication::all();
        $languages    = Language::all();
        $dates        = Date::all();


       $publications = Publication::where('status', 3)
                       ->inRandomOrder()
                       ->with('date', 'category_publication', 'language')
                       ->category_publication($this->category_publication_id)
                       ->language($this->language_id)
                       ->date($this->date_id)
                       ->paginate(12);


        return view('livewire.publication.publications-index', compact('publications', 'categories', 'languages', 'dates'));
    }

    public function resetFilters()
    {
        $this->reset(['category_publication_id', 'language_id', 'date_id']);
    }

}
