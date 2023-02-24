<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <title>Document</title>
</head>

<body>
    <x-layout>
        <x-slot name="content">
            <div class="relatives m:items-center py-4">
                <div class="mt-6">
                    <header>
                        <h1 class="text-xl font-bold text-gray-500 text-center mb-5">ADMIN</h1>
                    </header>

                    {{-- Project --}}
                    <div class="bg-gray-100 p-10 rounded-lg">
                        <h2 class="ml-1">Projects</h2>
                        <div class="text-right">
                            <a href="/admin/projects/create"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600 mb-5">Create
                                Project</a>
                        </div>
                        <section class="grid grid-cols-1 w-full gap-4">
                            @foreach ($projects as $project)
                                <div class="project-card-wrapper {{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }}">
                                    <x-admin.projects.project-card :project="$project" :show-body="false" />
                                    <div class="h-2 w-full"></div>
                                </div>
                            @endforeach
                        </section>
                    </div>

                    {{-- User --}}
                    <section class="grid grid-cols-1 w-full gap-4 mt-10 bg-gray-100 rounded-lg p-10">
                        <h2 class="ml-1">Users</h2>
                        <div class="flex justify-end mb-4">
                            <a href="/admin/users/create"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600">Create
                                User</a>
                        </div>
                        <div class="p-4">
                            <div class="mb-4">
                                @foreach ($users as $user)
                                    <div
                                        class="flex flex-column items-center justify-between {{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }} p-3">
                                        <a href="" class="mr-3">{{ $user->name }}</a>
                                        <div class="text-xs flex items-center ">
                                            <a href="/admin/users/{{ $user->id }}/edit" class="mr-3">
                                                <span class="material-symbols-outlined text-xs">edit</span> Edit
                                            </a>
                                            <div class="flex items-center">
                                                @if ($loggedInUser && $loggedInUser->id === $user->id)
                                                    <form method="POST" action="" class="inline">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="" class="text-red-600 mr-3 disabled">
                                                            Delete
                                                            <span
                                                                class="material-symbols-outlined text-xs">delete</span>
                                                        </a>
                                                    </form>
                                                @else
                                                    <form method="POST"
                                                        action="/admin/users/{{ $user->id }}/delete" class="inline">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="/admin/users/{{ $user->id }}/delete"
                                                            class="text-red-600 mr-3">
                                                            Delete
                                                            <span
                                                                class="material-symbols-outlined text-xs">delete</span>
                                                        </a>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    {{-- Category --}}
                    <section class="grid grid-cols-1 w-full gap-4 mt-10 bg-gray-100 rounded-lg p-10">
                        <h2 class="ml-1">Categories</h2>
                        <div class="flex justify-end mb-4">
                            <a href="/admin/categories/create"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600">Create
                                Category</a>
                        </div>
                        <div class="p-4">
                            <div class="mb-4">
                                @foreach ($categories as $category)
                                    <div
                                        class="flex flex-column items-center justify-between {{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }} p-3">
                                        <a href="" class="mr-3">{{ $category->name }}</a>
                                        <div class="text-xs flex items-center ">
                                            <a href="/admin/categories/{{ $category->slug }}/edit" class="mr-3">
                                                <span class="material-symbols-outlined text-xs">edit</span> Edit
                                            </a>
                                            <div class="flex items-center">
                                                <form method="POST"
                                                    action="/admin/categories/{{ $category->slug }}/delete"
                                                    class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/admin/categories/{{ $category->slug }}/delete"
                                                        class="text-red-600 mr-3">
                                                        Delete
                                                        <span class="material-symbols-outlined text-xs">delete</span>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </section>

                    {{-- Tag --}}
                    <section class="grid grid-cols-1 w-full gap-4 mt-10 bg-gray-100 rounded-lg p-10">
                        <h2 class="ml-1">Tags</h2>
                        <div class="flex justify-end mb-4">
                            <a href="/admin/tags/create"
                                class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600">Create
                                Tag</a>
                        </div>
                        <div class="p-4">
                            <div class="mb-4">
                                @foreach ($tags as $tag)
                                    <div
                                        class="flex flex-column items-center justify-between {{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }} p-3">
                                        <a href="" class="mr-3">{{ $tag->name }}</a>
                                        <div class="text-xs flex items-center ">
                                            <a href="/admin/tags/{{ $tag->slug }}/edit" class="mr-3">
                                                <span class="material-symbols-outlined text-xs">edit</span> Edit
                                            </a>
                                            <div class="flex items-center">
                                                <form method="POST" action="/admin/tags/{{ $tag->slug }}/delete"
                                                    class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/admin/tags/{{ $tag->slug }}/delete"
                                                        class="text-red-600 mr-3">
                                                        Delete
                                                        <span class="material-symbols-outlined text-xs">delete</span>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </section>
                </div>
            </div>
        </x-slot>
    </x-layout>
</body>

</html>
