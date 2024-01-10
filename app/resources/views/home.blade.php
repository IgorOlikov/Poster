<x-app-layout>

</x-app-layout>

    @if(\Illuminate\Support\Facades\Route::is('home'))
        <!-- <div class="min-h-screen max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> -->


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
            <div class="sm:grid lg:grid-cols-3 sm:grid-cols-2 gap-10">
                @foreach($posts as $post)
                    <div class="transition duration-300 max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="py-4 px-8">
                            <a href="{{route('user.show',$post->owner)}}">
                            <img src="{{$post->owner->avatar}}" class="rounded-full h-12 w-12 mb-4">
                            </a>
                            <a href="/users/{{ $post->owner->id }}">
                                <h4 class="text-lg mb-3 font-semibold">Author {{ $post->owner->name }}</h4>
                            </a>
                            <a href="/posts/{{ $post->id }}">
                                <h4 class="text-lg mb-3 font-semibold">{{ $post->title }}</h4>
                            </a>
                            <p class="mb-2 text-sm text-gray-600">{{ $post->body }}</p>

                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        @endif
        </body>
        </html>

