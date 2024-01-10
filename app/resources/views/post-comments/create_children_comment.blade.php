@include('layouts.app')

<form class="max-w-sm mx-auto mt-20" method="post" action="{{ route('comments.store',$post) }}">
@csrf
<label></label>
<input type="number" hidden="" value="{{ $comment->id }}" name="parent_id">
<label></label>
<input type="number" hidden="" value="{{ $post->id }}" name="post_id">
<label></label>
<input type="number" hidden="" value="{{ Auth::user()->id }}" name="user_id">
    <div class="mb-5">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Write comment!</label>
        <textarea id="message" type="text" name="comment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Reply..."></textarea>
    </div>
    <button type="submit">Submit</button>

</form>
