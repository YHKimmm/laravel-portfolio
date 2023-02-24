<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <x-layout>
        <x-slot name="content">
            <main class="max-w-lg mx-auto">
                @if ($project)
                    <h1 class="text-center font-bold text-xl mb-3">Edit Project: {{ $project->title }}</h1>
                    <form method="POST" action="/admin/projects/{{ $project->slug }}/edit"
                        enctype="multipart/form-data">
                        @method('PATCH')
                    @else
                        <h1 class="text-center font-bold text-xl mb-3">Create Project</h1>
                        <form method="POST" action="/admin/projects/create" enctype="multipart/form-data">
                @endif
                @csrf
                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">TITLE</label>
                    <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}"
                        required class="border border-gray-400 rounded p2 w-full">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Excerpt --}}
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">EXCERPT</label>
                    <input type="text" name="excerpt" id="excerpt"
                        value="{{ old('excerpt') ?? $project?->excerpt }}" required
                        class="border border-gray-400 rounded p2 w-full">
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Body --}}
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">BODY</label>
                    <input type="text" name="body" id="body" value="{{ old('body') ?? $project?->body }}"
                        required class="border border-gray-400 rounded p2 w-full">
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- URL --}}
                <div class="mb-6">
                    <label for="url" class="block mb-2 uppercase font-bold text-xs text-gray-700">URL</label>
                    <input type="text" name="url" id="url" value="{{ old('url') ?? $project?->url }}"
                        required class="border border-gray-400 rounded p2 w-full">
                    @error('url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Publoished --}}
                <div class="mb-6">
                    <label for="published_date"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">PUBLISHED</label>
                    <input type="date" name="published_date" id="published_date"
                        value="{{ old('published_date') ?? $project?->published_date }}" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('published_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Thumbnail --}}
                <div class="mb-6">
                    <label for="thumb" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                    <input type="file" name="thumb" id="thumb" value="{{ old('thumb') ?? $project?->thumb }}"
                        class="border border-gray-400 rounded p2 w-full">
                    @error('thumb')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="mb-6">
                    <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">Image</label>
                    <input type="file" name="image" id="image" value="{{ old('image') ?? $project?->image }}"
                        class="border border-gray-400 rounded p2 w-full">
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <select name="category_id" id="category_id">
                    <option value="" selected disabled>Select a Category</option>
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        @if ($project)
                            {
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id', $project->category_id)) selected @endif>
                                {{ $category->name }}
                            </option>
                            }
                        @else
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endif
                    @endforeach
                </select>

                {{-- Tags --}}
                <div class="mt-4">
                    <label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tags</label>
                    <select name="tags[]" id="tags" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                @if (old('tags') && in_array($tag->id, old('tags'))) selected
                        @elseif ($project && $project->tags)
                            @foreach ($project->tags as $projectTag)
                                @if ($tag->id == $projectTag->id)
                                    selected @endif
                                @endforeach
                        @endif
                        >
                        {{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 mt-4">
                    <button type="submit"
                        class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
                </div>
                </form>
            </main>
        </x-slot>
    </x-layout>
</body>

</html>
