<?php

namespace App\Jobs;

use App\Mail\CommentReplied;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CommentReplyNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Comment $parentComment;
    private User $commentator;

    /**
     * Create a new job instance.
     */
    public function __construct(User $commentator, Comment $parentComment)
    {
        $this->parentComment = $parentComment;
        $this->commentator = $commentator;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->parentComment->comment_owner()->email)->send(new CommentReplied($this->commentator,$this->parentComment));
    }
}
