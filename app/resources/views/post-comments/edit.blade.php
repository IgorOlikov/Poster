
<form method="post" action="{{ route('comments.update',$comment) }}">
    @csrf
    @method('PUT')

    <label></label>
    <input type="hidden" name="parent_id" hidden="" value="{{ $comment->parent_id }}">
    <label></label>
    <input type="number" name="post_id" hidden="" value="{{ $comment->post_id }}">
    <label></label>
    <input type="number" name="user_id" hidden="" value="{{ $comment->user_id }}">
    <label>comment</label>
    <input type="text" name="comment" value="{{ $comment->comment }}">
    <button type="submit">Submit</button>
</form>
