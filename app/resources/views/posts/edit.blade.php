@include('layouts.app')




<form enctype="multipart/form-data" class="max-w-sm mx-auto mt-20" method="post" action="{{ route('posts.update',$post) }}">
    @csrf
    @method('PUT')

    <div class="form-group">


        <div>
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post text</label>
            <textarea name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Post Text...">{{ $post->body }}
            </textarea>
        </div>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
        <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" >Upload Post image</div>
    </div>

    <button type="submit"  class="focus:outline-none text-white bg-red-800 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 ">
        Update Post!
    </button>
</form>
