<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
       if (!Auth::check()){
           return false;
       }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable','int','exists:comments,id'],
            //'post_id' => ['required','int','exists:posts,id'],
            //'user_id' => ['required', 'int', 'exists:users,id'],
            'comment' => ['required','string','max:255']
        ];
    }
}
