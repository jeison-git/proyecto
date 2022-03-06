<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedPublication;
use App\Mail\RejectPublication;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::where('status', 2)->paginate(8);

        return view('admin.publications.index', compact('publications'));
    }

    public function show(Publication $publication)
    {

        $this->authorize('revision', $publication);

        return view('admin.publications.show', compact('publication'));
    }

    public function approved(Publication $publication)
    {

        $this->authorize('revision', $publication);

        if (!$publication->title || !$publication->subtitle || !$publication->gender || !$publication->description || !$publication->image) {
            return back()->with('info', 'No se puede publicar un algo que no esté completo');
        }

        $publication->status = 3;
        $publication->save();

        //Envio de correos
        $mail = new ApprovedPublication($publication);

        //Mail::to($publication->editor->email)->queue($mail);
        Mail::to($publication->editor->email)->send($mail);

        return redirect()->route('admin.publications.index')->with('info', 'La publicación se publicó con éxito');
    }

    public function check(Publication $publication)
    {
        return view('admin.publications.check', compact('publication'));
    }

    public function reject(Request $request, Publication $publication)
    {

        $request->validate([
            'body' => 'required'
        ]);

        $publication->check()->create($request->all());

        $publication->status = 1;
        $publication->save();

        //Envio de correos
        $mail = new RejectPublication($publication);
        // Mail::to($publication->editor->email)->queue($mail);
        Mail::to($publication->editor->email)->send($mail);

        return redirect()->route('admin.publications.index')->with('info', 'La publicación se descarto con éxito');
    }
}
