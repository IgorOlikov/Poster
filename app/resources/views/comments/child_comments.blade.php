<div class="flex">
    <div class="flex-shrink-0 mr-3">
        <a href="{{ route('user.show',$child_comment->comment_owner)}}">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{$child_comment->comment_owner->avatar}}">
        </a>
    </div>
    <div class="flex-1 border ml-5 rounded-lg px-2 py-4 sm:px-6 sm:py-4 leading-relaxed">
        <a href="{{ route('user.show',$child_comment->comment_owner->id) }}" ><strong>{{ $child_comment->comment_owner->name }}</strong></a> <span class="text-xs text-gray-400">{{ $child_comment->created_at }}</span>

        <a href="{{ route('user.show', $child_comment->parent_comment->comment_owner->id)}}"><strong><p class="text-sm">Replied {{ $child_comment->parent_comment->comment_owner->name }} {{ $child_comment->parent_comment->comment }}</p></strong></a>

        <p class="text-sm">{{ $child_comment->comment }}</p>

        <a href="{{ route('posts.comments.children.create',[$post,$child_comment]) }}">Comment</a>

        @auth()
            @can('update', $child_comment)
        <a href="{{ route('posts.comments.edit',[$post,$child_comment]) }}">Edit</a>

        <form method="post" action="{{ route('comments.destroy',$child_comment) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
            @endcan
        @endauth

    </div>
</div>
    @if ($child_comment->child_comments)
            @foreach ($child_comment->child_comments as $child_comment)
                @include('comments.child_comments', ['child_comment' => $child_comment])
            @endforeach
    @else
@endif
