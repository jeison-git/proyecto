<?php

namespace App\Http\Controllers\Publication;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public $publication, $current;

    public function index()
    {
        return view('publications.index');
    }

    public function show(Publication $publication)
    {

        // $this->authorize('published', $Publication);

        $similares = Publication::where('category_publication_id', $publication->category_publication_id)
            ->where('id', '!=', $publication->id)
            ->latest('id')
            ->take(5)
            ->get();

        return view('publications.show', compact('publication', 'similares'));
    }

    public function enrolled(Publication $publication)
    {

        $publication->users()->attach(auth()->user()->id);

        return redirect()->route('publications.show', $publication);
    }

}
