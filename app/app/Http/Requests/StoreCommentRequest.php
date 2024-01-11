<?php

namespace App\Http\Requests;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (!($this->user()->id) === ((int)$this->user_id)) {
            return false;
        }
        if (!($this->post->id === (int)$this->post_id)) {
            return false;
        }
        if (!is_null($this->parent_id)) {
               $parentPostId = Comment::where('id','=',(int)$this->parent_id)->value('post_id');
               if (!($parentPostId === (int)$this->post->id)){
                   return false;
               }
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
            'post_id' => ['required','int','exists:posts,id'],
            'user_id' => ['required', 'int', 'exists:users,id'],
            'comment' => ['required','string','max:255']
        ];
    }
}
