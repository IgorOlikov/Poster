@include('layouts.app')


<div>
    <main class="align-items-sm-center">



            @foreach($posts as $post)
                <p>{{ $post->title }}</p>
            @endforeach




    </main>
</div>
</div>
</body>
</html>

