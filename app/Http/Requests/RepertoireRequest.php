<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepertoireRequest extends FormRequest
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
            'title' => ['required','string','min:4','max:255'],
            'subtitle' => ['nullable','string','min:4','max:255'],
            'duration' => ['required','string'],
            'movements' => ['nullable','string','min:4','max:255'],
            'composer' => ['required','string','min:4','max:255'],
            'arranger' => ['nullable','string','min:4','max:255'],
            'lyricist' => ['nullable','string','min:4','max:255'],
            'choreographer' => ['nullable','string','min:4','max:255'],
            'comments' => ['nullable','string','min:4','max:255'],
        ];
    }
}
