<div class="flex">
    <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
    </div>
    <div class="flex-1 border ml-5 rounded-lg px-2 py-4 sm:px-6 sm:py-4 leading-relaxed">
        <a href="{{ route('user.show',$child_comment->comment_owner->id) }}" ><strong>{{ $child_comment->comment_owner->name }}</strong></a> <span class="text-xs text-gray-400">{{ $child_comment->created_at }}</span>

        <a href="{{ route('user.show', $child_comment->parent_comment->comment_owner->id)}}"><strong><p class="text-sm">Replied {{ $child_comment->parent_comment->comment_owner->name }} {{ $child_comment->parent_comment->comment }}</p></strong></a>

        <p class="text-sm">{{ $child_comment->comment }}</p>

        <a href="{{ route('posts.comments.children.create',[$post,$child_comment]) }}">Comment</a>

        @auth()
            @if((Auth::user()->id === $comment->user_id) || (Auth::user()->is_admin))
        <a href="{{ route('posts.comments.edit',[$post,$child_comment]) }}">Edit</a>

        <form method="post" action="{{ route('comments.destroy',$child_comment) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
            @endif
        @endauth

    </div>
</div>
    @if ($child_comment->child_comments)
            @foreach ($child_comment->child_comments as $child_comment)
                @include('comments.child_comments', ['child_comment' => $child_comment])
            @endforeach
    @else
@endif
