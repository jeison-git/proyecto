<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

use Livewire\WithPagination;

class ShowContacts extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //Función para mostrar lista de correos enviados desde contactanos
        $contacts = Contact::where('email', 'like', '%' . $this->search . '%')
        ->latest('id')
        ->paginate(10);

        return view('livewire.admin.show-contacts', compact('contacts'))->layout('layouts.guest');
    }
}
