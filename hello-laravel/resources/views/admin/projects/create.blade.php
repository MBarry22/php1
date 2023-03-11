<x-layout>
    <x-slot name="content">
        
    <div class="flex justify-center items-center h-full">
        <div class="w-full max-w-md">
            @if ($project)
                <h1 class="text-center font-bold text-xl mb-3">Edit Project: {{ $project->title }}</h1>
                <form method="POST" action="/admin/projects/{{ $project->id }}/edit" enctype="multipart/form-data">
                 @method('PATCH')
            @else
                <h1 class="text-center font-bold text-xl mb-3">Create Project</h1>
                <form method="POST" action="/admin/projects/create" enctype="multipart/form-data">
            @endif

            <form method="POST" action="/admin/projects/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block mb-2 font-bold text-gray-700 ">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="excerpt" class="block mb-2 font-bold text-gray-700">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" required
                        class="border border-gray-400 rounded p-2 w-full">{{ old('excerpt') ?? $project?->excerpt }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="body" class="block mb-2 font-bold text-gray-700">Body</label>
                    <textarea name="body" id="body" required
                        class="border border-gray-400 rounded p-2 w-full">{{ old('body') ?? $project?->body }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="url" class="block mb-2 font-bold text-gray-700">URL</label>
                    <input type="text" name="url" id="url" value="{{ old('url') ?? $project?->url }}" 
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="thumb" class="block mb-2 font-bold text-gray-700">Thumbnail</label>
                    <input type="file" name="thumb" id="thumb"
                    value="{{ old('thumb') ?? $project?->thumb }}"
                    class="border border-gray-400 rounded p2 w-full">
                    @error('thumb')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block mb-2 font-bold text-gray-700">Image</label>
                    <input type="file" name="image" id="image"
                    value="{{ old('image') ?? $project?->image }}"
                    class="border border-gray-400 rounded p2 w-full">
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="published_at" class="block mb-2 font-bold text-gray-700">Published Date</label>
                    <input type="date" name="published_at" id="published_at" value="{{ old('published_at') ?? $project?->published_at }}" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('published_at')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                        <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                        <select name="category_id" id="category_id" required
                            class="border border-gray-400 rounded p-2 w-full">
                            <option value="" selected disabled>Select a Category</option>
                            <option value="">None</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if ($category->id == old('category_id')) 
                                        selected 
                                        @elseif ($category->id == $project?->category_id)
                                        selected
                                    @endif
                                    >
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <!-- CTRL + CLICK FOR SELECTING MULTIPLE TAGS -->
                    <label for="tags" class="block mb-2 font-semibold text-gray-800">Tags:</label>
                    <select name="tags[]" id="tags" multiple="multiple" class="w-full px-3 py-2 border rounded-lg shadow-sm">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if (old('tags') && in_array($tag->id, old('tags'))) selected @elseif ($project && $project->tags) @foreach ($project->tags as $projectTag) @if ($tag->id == $projectTag->id) selected @endif @endforeach @endif>
                            {{ $tag->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>

