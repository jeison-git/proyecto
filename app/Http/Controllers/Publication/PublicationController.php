<?php

namespace App\Http\Controllers\Publication;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public $publication, $current;

    public function index(){
        return view('publications.index');
    }

    public function show(Publication $publication){

       // $this->authorize('published', $Publication);

        $similares = Publication::where('category_publication_id', $publication->category_publication_id)
                            ->where('id', '!=', $publication->id)
                            ->latest('id')
                            ->take(5)
                            ->get();
        //$file = Storage::download(storage_path('app/' . $Publication->resource->url));

        return view('publications.show', compact('publication','similares'));

    }

    public function enrolled(Publication $publication){

        $publication->users()->attach(auth()->user()->id);

        return redirect()->route('publications.show', $publication);
    }

    public function download(){/* ojo aqui */
        return response()->download(Storage::copy('app/' . $this->publication->resource->url));
    }
}
