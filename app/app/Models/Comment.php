<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['parent_id','post_id','user_id','comment'];

    public function comment_owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function parent_comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class,'parent_id','id');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class,'parent_id','id');
    }

    public function child_comments(): HasMany
    {
        return $this->hasMany(Comment::class,'parent_id','id')->with('child_comments');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

}
