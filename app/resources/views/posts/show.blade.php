@include('layouts.app')



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">

    @auth()
        @can('update', $post)
        <a href="{{ route('posts.edit',$post) }}">
        <button>Edit Post</button>
        </a>

        <form action="{{ route('posts.destroy',$post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Post</button>
        </form>
        @endcan
    @endauth
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 transition duration-300  rounded overflow-hidden shadow-lg">
        <div class="py-4 px-8">
            <a href="{{ route('user.show',$post->owner) }}">
            <img src="{{$post->owner->avatar}}" class="rounded-full h-12 w-12 mb-4">
            </a>
            <a href="{{ route('user.show',$post->owner) }}">
                <h4 class="text-lg mb-3 font-semibold">Author {{ $post->owner->name }}</h4>
            </a>
            <img src="{{$post->image}}" class="">
            <h4 class="text-lg mb-3 font-semibold">{{ $post->title }}</h4>

            <p class="mb-2 text-sm text-gray-600">{{ $post->body }}</p>

        </div>
    </div>

    <div class="antialiased  max-w-screen-sm mt-20">
        <h3 class="text-lg font-semibold text-gray-900">Comments</h3>
        <div class="space-y-4 mt-10">
        </div>
    </div>
      <a href="{{ route('posts.comments.create',$post) }}">Create Comment</a>

    @include('comments.parent_comments')

    </div>
    </div>
    </div>
    </body>
    </html>
