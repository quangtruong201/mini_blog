<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Edit Category</h1>
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf @method('PUT')
        <label>Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="border p-2 w-full" />
        <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2">Update</button>
    </form>
</x-app-layout>
