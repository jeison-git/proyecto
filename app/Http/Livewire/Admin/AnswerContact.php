<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use App\Mail\AnswerContacts;
use Illuminate\Support\Facades\Mail;

class AnswerContact extends Component
{
    public $contact, $contacts;

    //validar
    protected $rules = [
        'contact.issue'   => 'required',
        'contact.name'    => 'required',
        'contact.phone'   => 'required',
        'contact.email'   => 'required',
        'contact.comment' => 'required',
    ];

    //limpiar el formulario
    protected $listeners = ['refreshContact', 'delete'];

    public function mount(Contact $contact)
    {

        $this->contact = $contact;
    }

    //funcion limpiar filtro
    public function refreshContact()
    {
        $this->contact = $this->contact->fresh();
    }

    //guardar los datos del mensaje
    public function save()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $this->contact->save();

        $this->emit('saved');
    }

    //eliminar mensaje
    public function delete()
    {

        $this->contact->delete();

        return redirect()->route('admin.contacts.index');
    }
    public function render()
    {
        return view('livewire.admin.answer-contact')->layout('layouts.guest');
    }
}
