@foreach($comments as $comment)
<div class="flex">
    <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
    </div>
    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <a href="users/{{ $comment->comment_owner->id }}"><strong>{{ $comment->comment_owner->name }}</strong></a> <span class="text-xs text-gray-400">{{ $comment->created_at }}</span>
        <p class="text-sm">{{ $comment->parent_id }} {{ $comment->comment }}</p>


        <a href="{{ route('posts.comments.children.create',[$post,$comment]) }}">Comment</a>

        @auth()
            @if((Auth::user()->id === $comment->user_id) || (Auth::user()->is_admin))
        <a href="{{ route('posts.comments.edit',[$post,$comment]) }}">Edit</a>

        <form method="post" action="{{ route('comments.destroy',$comment) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
            @endif
        @endauth

    </div>
</div>
@foreach($comment->child_comments as $child_comment)
    @include('comments.child_comments',['child_comment' => $child_comment])
@endforeach

@endforeach

