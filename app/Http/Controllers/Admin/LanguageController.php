<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:languages'
        ]);
        $language = Language::create($request->all());
        return redirect()->route('admin.languages.index', $language)->with('info', 'Se añadio la categoria ' . $language->name);
    }

    public function show(Language $language)
    {
        return view('admin.languages.show', compact('language'));
    }

    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required|unique:languages,name,' . $language->id
        ]);

        $language->update($request->all());

        return redirect()->route('admin.languages.index', $language)->with('info', 'El idioma ' . $language->name . ' se actualizo');
    }


    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('admin.languages.index')->with('info', 'El idioma ' . $language->name . ' se elimino');
    }
}
