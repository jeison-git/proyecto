<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|min:10|max:80',
            'description' => 'required|min:10|max:600',
            'finished_at' => 'nullable|after:' . now(),
        ];
    }

    public function attributes()
    {
        return [
            'title'       => "'Título de la trivia'",
            'description' => "'Descripción de la trivia'",
            'finished_at' => "'Fecha de vencimiento'",
        ];
    }
}
