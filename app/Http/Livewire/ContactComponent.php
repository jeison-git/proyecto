<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactComponent extends Component
{
    //Registros de mensajes de contactos

    public $contact, $contacts;

    protected $listeners = ['save'];

    public $createForm = [

        'issue'   => null,
        'name'    => null,
        'email'   => null,
        'phone'   => null,
        'comment' => null
    ];


    protected $rules = [
        'createForm.issue'   => 'required',
        'createForm.name'    => 'required',
        'createForm.email'   => 'required|email',
        'createForm.phone'   => 'required',
        'createForm.comment' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.issue'   => 'asunto',
        'createForm.name'    => 'nombre',
        'createForm.email'   => 'correo',
        'createForm.phone'   => 'telefono',
        'createForm.comment' => 'mensaje',
    ];

    public function mount()
    {

        $this->getContacts();
    }

    public function getContacts()
    {
        $this->contacts = Contact::all();
    }

    public function save()
    {
        $this->validate();

        Contact::create([
            'issue'   => $this->createForm['issue'],
            'name'    => $this->createForm['name'],
            'email'   => $this->createForm['email'],
            'phone'   => $this->createForm['phone'],
            'comment' => $this->createForm['comment']
        ]);

        $this->reset('createForm');

        $this->getContacts();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
