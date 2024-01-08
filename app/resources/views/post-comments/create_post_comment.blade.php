<form method="post" action="{{ route('comments.store',$post) }}">
@csrf
<label></label>
<input type="number" hidden="" name="parent_id">
<label></label>
<input type="number" hidden="" value="{{ $post->id }}" name="post_id">
<label></label>
<input type="number" hidden="" value="{{ Auth::user()->id }}" name="user_id">
<label>Write Comment!</label>
<input type="text" name="comment">
<button type="submit">Submit</button>
</form>
