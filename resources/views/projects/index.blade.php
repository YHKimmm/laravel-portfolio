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
        <div class="relative flex justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4">
            <div class="mt-6">
                <section class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>
                @if (count($projects))
                <div class="text-xs w-full text-right">{{ count($projects) }} projects to peep.</div>
                @else
                <div>Nothing to showcase, yet.</div>
                @endif
            </div>
        </div>
    </x-slot>
</x-layout>

</body>
</html>