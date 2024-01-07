
<form method="post" action="{{ route('comments.store') }}">
    @csrf
    <label>parent id</label>
    <input type="number" name="parent_id">
    <label>post id</label>
    <input type="number" name="post_id">
    <label>user id</label>
    <input type="number" name="user_id">
    <label>comment</label>
    <input type="text" name="comment">
    <button type="submit">Submit</button>
</form>
