<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Date;

class DateController extends Controller
{
    public function index()
    {
        $dates = Date::all();
        return view('admin.dates.index', compact('dates'));
    }

    public function create()
    {
        return view('admin.dates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|unique:dates'
        ]);
        $date = Date::create($request->all());
        return redirect()->route('admin.dates.index', $date)->with('info', 'Se añadio la fecha de publicación' . $date->year);
    }

    public function show(Date $date)
    {
        return view('admin.dates.show', compact('date'));
    }

    public function edit(Date $date)
    {
        return view('admin.dates.edit', compact('date'));
    }

    public function update(Request $request, Date $date)
    {
        $request->validate([
            'year' => 'required|unique:dates,year,' . $date->id
        ]);

        $date->update($request->all());

        return redirect()->route('admin.dates.index', $date)->with('info', 'El año de publicación ' . $date->year . ' se actualizo');
    }


    public function destroy(Date $date)
    {
        $date->delete();
        return redirect()->route('admin.dates.index')->with('info', 'El año de publicación ' . $date->year . ' se elimino');
    }
}
