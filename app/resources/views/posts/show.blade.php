@include('layouts.app')





<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
    @if(\Illuminate\Support\Facades\Auth::user()->id === $post->user_id)
        <a href="{{ route('posts.edit',$post) }}">
        <button>Update Post</button>
        </a>
        <form action="{{ route('posts.destroy',$post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Post</button>
        </form>
    @endif


    <div class="hover:bg-gray-900 hover:text-white transition duration-300 max-w-sm rounded overflow-hidden shadow-lg">
        <div class="py-4 px-8">
            <img src="https://tailwindcss.com/img/jonathan.jpg" class="rounded-full h-12 w-12 mb-4">
            <a href="/posts/{{ $post->id }}">
                <h4 class="text-lg mb-3 font-semibold">{{ $post->title }}</h4>
            </a>
            <p class="mb-2 text-sm text-gray-600">{{ $post->body }}</p>

        </div>
    </div>
</div>


    </div>
    </div>


    </body>
    </html>
