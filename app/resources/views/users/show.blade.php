@include('layouts.app')

<div class="h-screen pt-12">

    <!-- Card start -->
    <div class="max-w-sm mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg">
        <div class="border-b px-4 pb-6">
            <div class="text-center my-4">
                <img class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                     src="{{$user->avatar}}" alt="">
                <div class="py-2">
                    <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-1">{{ $user->name }}</h3>
                    <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                        {{$user->email}}
                    </div>
                </div>

            @auth()
                    @if((Auth::check()) && (Auth::user()->id === $user->id))
            </div>
            <div class="flex gap-2 px-2">
                <a href="{{ route('create-image.profile.image') }}">
                <button
                    class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                    Edit Profile Image
                </button>
                </a>
                <a href="{{route('profile.edit')}}">
                <button
                    class="flex-1 rounded-full border-2 border-gray-100 dark:border-gray-700 font-semibold text-black dark:text-white px-4 py-2">
                    Edit Profile Data
                </button>
                </a>
            </div>
        </div>
        @endif
        @endauth
    </div>
    </div>
    <!-- Card end -->

</div>
