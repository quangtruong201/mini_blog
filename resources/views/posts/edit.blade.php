<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="border p-2 w-full" />
        </div>
        <div class="mt-2">
            <label>Content</label>
            <textarea name="content" class="border p-2 w-full">{{ $post->content }}</textarea>
        </div>
        <div class="mt-2">
            <label>Category</label>
            <select name="category_id" class="border p-2 w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2">Update</button>
    </form>
</x-app-layout>
