@include('layouts.app')

<form enctype="multipart/form-data" class="max-w-sm mx-auto mt-20" method="post" action="{{ route('upload.profile.image') }}">
    @csrf
    @method('POST')
    <div class="form-group">



        <label class="block mb-2 text-sm font-medium text-gray-900 " for="user_avatar">Upload User Image</label>
        <input name="image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Upload User image</div>


        <button>Submit!!!</button>

    </div>


</form>
