<?php

namespace App\Http\Requests;


use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StorePostRequest extends FormRequest
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
            'title' => ['required','string','unique:posts,title'],
            'body' => ['required','string'],
            'image' => ['prohibited'],

        ];
    }
}
