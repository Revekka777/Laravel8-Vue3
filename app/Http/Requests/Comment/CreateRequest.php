<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class CreateRequest extends FormRequest
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
            'subject'=>'required|min:6',
            'body' => 'required|min:10',
            'article_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'subject.required' => 'Это поле обязательно к заполнению',
            'subject.min' => 'Длина поля должна быть более 6 символов',
            'body.required' => 'Это поле обязательно к заполнению',
            'body.min' => 'Длина поля должна быть более 10 символов',
        ];
    }
}
