<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Create Category</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <label>Name</label>
        <input type="text" name="name" class="border p-2 w-full" />
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Save</button>
    </form>
</x-app-layout>
