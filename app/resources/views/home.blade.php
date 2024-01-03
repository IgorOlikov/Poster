<x-app-layout>

</x-app-layout>


    <main class="min-h-screen">
        <div class="container-md  sm:max-w-2xl  bg-red-800">
        <!-- slot -->
        @if(\Illuminate\Support\Facades\Route::is('home'))

            @foreach($posts as $post)
                <p>{{ $post->title }}</p>
            @endforeach

        @endif

        <div class="grid gap-4 grid-cols-2">
            <div>01</div>
            <div>02</div>
            <div>03</div>
            <div>04</div>
        </div>

        </div>
    </main>

</div>
</body>
</html>

