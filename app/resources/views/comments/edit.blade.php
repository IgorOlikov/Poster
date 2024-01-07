
<form method="post" action="{{ route('comments.update',$comment) }}">
    @csrf
    @method('PUT')

    <label>parent id</label>
    <input type="number" name="parent_id" value="{{ $comment->parent_id }}">
    <label>post id</label>
    <input type="number" name="post_id" value="{{ $comment->post_id }}">
    <label>user id</label>
    <input type="number" name="user_id" value="{{ $comment->user_id }}">
    <label>comment</label>
    <input type="text" name="comment" value="{{ $comment->comment }}">
    <button type="submit">Submit</button>
</form>
