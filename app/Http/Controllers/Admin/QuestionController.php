<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::whereId($id)->with('questions')->first() ?? abort(404, 'Quiz does not exist!');
        return view('admin.trivia.questions.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.trivia.questions.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $filename = Str::slug($request->question) . '.' . $request->image->extension();
            $filenameWithUpload = 'questions-image/' . $filename;
            $request->image->move(public_path('questions-image'), $filename);
            $request->merge([
                'image' => $filenameWithUpload
            ]);
        }
        Quiz::find($id)->questions()->create($request->post());

        return redirect()->route('admin.trivia.questions.index', $id)->with('info', '¡La pregunta se ha creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Quiz or Question does not exist!');
        return view('admin.trivia.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id, $question_id)
    {
        if ($request->hasFile('image')) {
            $filename = Str::slug($request->question) . '.' . $request->image->extension();
            $filenameWithUpload = 'questions-image/' . $filename;
            $request->image->move(public_path('questions-image'), $filename);
            $request->merge([
                'image' => $filenameWithUpload
            ]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());

        return redirect()->route('admin.trivia.questions.index', $quiz_id)->with('info', '¡La pregunta se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id, $question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->delete();

        return redirect()->route('admin.trivia.questions.index', $quiz_id)->with('info', '¡La pregunta se ha eliminado correctamente!');
    }
}
