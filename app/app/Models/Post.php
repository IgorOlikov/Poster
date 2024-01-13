<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['post_image','title','slug','body','user_id'];


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'post_id','id'); // with children comments
    }

    //public function children_comments(): HasMany
    //{
    //    return $this->hasMany(Comment::class,'post_id','id')->with('comments'); // with children comments
    //}




}
