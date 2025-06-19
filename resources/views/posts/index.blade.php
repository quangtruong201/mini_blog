<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Post List</h1>

    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New</a>

    <table class="mt-4 w-full border">
        <thead>
            <tr>
                <th class="border p-2">Title</th>
                <th class="border p-2">Category</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="border p-2">{{ $post->title }}</td>
                <td class="border p-2">{{ $post->category->name ?? '—' }}</td>
                <td class="border p-2">
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block ml-2">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete?')" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
