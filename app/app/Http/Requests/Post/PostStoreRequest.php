<?php

namespace App\Http\Requests\Post;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string','max:30','unique:posts,title'],
            'body' => ['required','max:255','string'],
            'image' => ['sometimes','image'],

        ];
    }
}
