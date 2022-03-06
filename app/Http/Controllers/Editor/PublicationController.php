<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Category_Publication;
use App\Models\Language;
use App\Models\Publication;
use App\Models\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PublicationController extends Controller
{

    public function index()
    {
        return view('editor.publications.index');
    }

    public function create()
    {
        $categories = Category_Publication::pluck('name', 'id');
        $languages  = Language::pluck('name', 'id');
        $dates = Date::pluck('year', 'id');

        return view('editor.publications.create', compact('categories', 'languages', 'dates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required',
            'subtitle' => 'required',
            'author'   => 'required',
            'gender'   => 'required',
            'slug'     => 'required|unique:publications',
            'description' => 'required',
            'file' => 'mimes:jpg,png,gif',
            'pdf'  => 'mimes:pdf',
        ]);

        $publication = Publication::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('publications', $request->file('file'));

            $publication->image()->create([
                'url' => $url
            ]);
        }

        if ($request->file('pdf')) {
            $url = Storage::put('resources', $request->file('pdf'));

            $publication->resource()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('editor.publications.edit', $publication);
    }


    public function show(Publication $publication)
    {
        return view('editor.publications.show', compact('publication'));
    }

    public function edit(Publication $publication)
    {

        $this->authorize('dicatated', $publication);

        $categories = Category_Publication::pluck('name', 'id');
        $languages  = Language::pluck('name', 'id');
        $dates = Date::pluck('year', 'id');

        return view('editor.publications.edit', compact('publication', 'categories', 'languages', 'dates'));
    }

    public function update(Request $request, Publication $publication)
    {

        $this->authorize('dicatated', $publication);

        $request->validate([
            'title'    => 'required',
            'subtitle' => 'required',
            'author'   => 'required',
            'gender'   => 'required',
            // 'slug' => 'required|unique:publications,slug,' .$course->id,
            'description' => 'required',
            'file' => 'mimes:jpg,bmp,png,gif,mp4,mkv,flv',
            'pdf'  => 'mimes:pdf',
        ]);

        $publication->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('publications', $request->file('file'));

            if ($publication->image) {
                Storage::delete($publication->image->url);

                $publication->image->update([
                    'url' => $url
                ]);
            } else {
                $publication->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->file('pdf')) {
            $url = Storage::put('resources', $request->file('pdf'));

            if ($publication->resource) {
                Storage::delete($publication->resource->url);

                $publication->resource->update([
                    'url' => $url
                ]);
            } else {
                $publication->resource()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('editor.publications.edit', $publication);
    }

    public function destroy(Publication $publication)
    {
        //
    }

    public function status(Publication $publication)
    {
        $publication->status = 2;
        $publication->save();

        if ($publication->observation) {
            $publication->observation->delete();
        }

        return redirect()->route('editor.publications.edit', $publication);
    }

    public function check(Publication $publication)
    {

        return view('editor.publications.check', compact('publication'));
    }
}
