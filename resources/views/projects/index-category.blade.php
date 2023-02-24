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
            <div class="relative flex justify-center sm:items-center py-4">
                <div class="mt-6">
                    {{-- Category Project lists --}}
                    @if (count($projects) > 0 && request()->is('projects/categories/*'))
                        @php
                            $categoryName = $projects[0]->category->name;
                        @endphp
                        @if ($categoryName)
                            <header>
                                <h1 class="text-2xl font-bold text-gray-500 text-center">{{ $categoryName }}</h1>
                            </header>
                        @endif
                        <a href="/projects" class="text-xs ml-3">
                            <- Back to Projects</a>
                                <section class="grid grid-cols-1 gap-5">
                                    @foreach ($projects as $project)
                                        <x-projects.project-card :project="$project" />
                                    @endforeach
                                </section>
                    @endif
                </div>
            </div>
        </x-slot>
    </x-layout>
</body>

</html>
