@include('layouts.app')



    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
        <a href="{{ route('posts.create') }}">
        <button class="bg-red-800" type="button">
            Create Post
        </button>
        </a>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
    <div class="sm:grid lg:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach($posts as $post)
                    <div class="hover:bg-gray-900 hover:text-white transition duration-300 max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="py-4 px-8">
                            <img src="https://tailwindcss.com/img/jonathan.jpg" class="rounded-full h-12 w-12 mb-4">
                            <a href="/posts/{{ $post->id }}">
                                <h4 class="text-lg mb-3 font-semibold">{{ $post->title }}</h4>
                            </a>
                            <p class="mb-2 text-sm text-gray-600">{{ $post->body }}</p>

                        </div>
                    </div>

  @endforeach
    </div>
    </div>


</body>
</html>

