<li>---Child - id - {{ $child_comment->id }} -Parent_Id {{$child_comment->parent_id}}  - {{ $child_comment->comment }}</li>

@if ($child_comment->child_comments)
    <ul> [Child Of Child]
        @foreach ($child_comment->child_comments as $child_comment)
            @include('comments.child_comments', ['child_comment' => $child_comment])
        @endforeach
    </ul>
@else
    IF НЕ СРАБОТАЛ !!!
@endif
