<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnswerContacts;
use App\Models\Send;

class ContactController extends Controller
{
    //lista de correos proveniente de conctato
    public function index(){
        return view('contacts.index');
    }

    //visualisar los mensajes
    public function message(Contact $contact){
        return view('contacts.message', compact('contact'));
    }

    //responder los mensajes
    public function answer(Request $request, Contact $contact){

        $request->validate([
            'body' => 'required'
        ]);

        $contact->send()->create($request->all());

        $contact->status = 2;
        $contact->save();

        //Envio de correos
        $mail = new AnswerContacts($contact);
        Mail::to($contact->email)->send($mail);

        return redirect()->route('admin.contacts.index');
    }
}
