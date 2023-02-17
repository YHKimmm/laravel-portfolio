<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
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
               <div class="bg-gray-100 p-10 rounded-lg">
                 <h2 class="ml-1">Projects</h2>
                <div class="text-right">
                    <a href="/admin/projects/create" class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600 mb-5">Create Project</a>
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
                <section class="grid grid-cols-1 w-full gap-4 mt-10 bg-gray-100 rounded-lg p-10">
                    <h2 class="ml-1">Users</h2>
                    <div class="flex justify-end mb-4">
                    <a href="/admin/users/create" class="inline-block px-4 py-2 bg-green-500 text-white font-bold rounded-md hover:bg-green-600">Create User</a>
                    </div>
                    <div class="p-4">
                        <div class="mb-4">
                            @foreach($users as $user)
                            <div class="flex flex-column items-center justify-between {{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }} p-3">
                                <a href="" class="mr-3">{{$user->name}}</a>
                                <div class="text-xs flex items-center ">
                                <a href="" class="mr-3">
                                    <span class="material-symbols-outlined text-xs">edit</span> Edit
                                </a>
                                <a href="" class="text-red-600">
                                    <span class="material-symbols-outlined text-xs">delete</span> Delete
                                </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </x-slot>
</x-layout>
</body>
</html>