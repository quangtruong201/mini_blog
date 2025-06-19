<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Category List</h1>

    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New</a>

    <table class="mt-4 w-full border">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">{{ $category->name }}</td>
                <td class="border p-2">
                    <a href="{{ route('categories.edit', $category) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block ml-2">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this category?')" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
