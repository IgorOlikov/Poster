@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- component -->
<div class="table w-full p-2">
    <table class="w-full border">
        <tbody>
        <tr class="bg-gray-50 text-center">
            <td class="p-2 border-r">


        </tr>
        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
            <td class="p-2 border-r">id</td>
            <td class="p-2 border-r">parent id</td>
            <td class="p-2 border-r">post id</td>
            <td class="p-2 border-r">user id</td>
            <td class="p-2 border-r">comment</td>
        </tr>
        @foreach($comments as $comment)
        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
            <td class="p-2 border-r">{{ $comment->id }}</td>
            <td class="p-2 border-r">{{ $comment->parent_id }}</td>
            <td class="p-2 border-r">{{ $comment->post_id }}</td>
            <td class="p-2 border-r">{{ $comment->user_id }}</td>
            <td class="p-2 border-r">{{ $comment->comment }}</td>
            <td>
                <a href="{{ route('comments.show',$comment) }}" class="bg-red-800 p-2 text-white hover:shadow-lg text-xs font-thin">Show</a>
                <a href="{{ route('comments.edit',$comment) }}" class="bg-red-800 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                <a href="{{ route('comments.create')}}" class="bg-red-800 p-2 text-white hover:shadow-lg text-xs font-thin">Create</a>
            </td>
            <td>
                <form method="post" action="{{ route('comments.destroy',$comment) }}" class="bg-red-800 p-2 text-white hover:shadow-lg text-xs font-thin">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>


            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
