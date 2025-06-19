<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" class="border p-2 w-full" />
        </div>
        <div class="mt-2">
            <label>Content</label>
            <textarea name="content" class="border p-2 w-full"></textarea>
        </div>
        <div class="mt-2">
            <label>Category</label>
            <select name="category_id" class="border p-2 w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Save</button>
    </form>
</x-app-layout>
