<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::withCount('questions');

        if (request()->get('title')) {
            $quizzes = $quizzes->where('title', 'LIKE', "%" . request()->get('title') . "%");
        }
        if (request()->get('status')) {
            $quizzes = $quizzes->where('status', request()->get('status'));
        }

        $quizzes = $quizzes->paginate(5);
        return view('admin.trivia.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trivia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('admin.trivia.quizzes.index')->with('info', '¡La trivia se ha creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::with('topTenUser.user', 'results')->withCount('questions')->find($id) ?? abort(404, 'Trivia Not Found!');

        return view('admin.trivia.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::withCount('questions')->find($id) ?? abort(404, "¡No hay información sobre la 'Trivia' buscada!");
        return view('admin.trivia.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz = Quiz::find($id) ?? abort(404, "¡No hay información sobre la 'Trivia' buscada!");
        Quiz::where('id', $id)->first()->update(request()->except(['_method', '_token']));
        return redirect()->route('admin.trivia.quizzes.index')->with('info', '¡La trivia se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz, $id)
    {
        $quiz = Quiz::find($id) ?? abort(404, "¡No hay información sobre la 'Trivia' buscada!");
        $quiz->delete();
        return redirect()->route('admin.trivia.quizzes.index')->with('info', '¡La trivia se ha eliminado correctamente!');
    }
}
