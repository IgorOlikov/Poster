<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (($this->user()->id) === ((integer)$this->user_id)){
            return true;
        }
        return false;
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
            'image' => ['nullable'],
            'user_id' => ['required','int','exists:users,id']
        ];
    }
}
