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
        <div>
            <a href="/projects" class="text-xs ml-3"> <- Back to Projects</a>
            <div class="mt-6">
                <section class="grid grid-cols-1 gap-5">
                    <x-projects.project-card :project="$project" :showBody="true"/>
                </section>
            </div>
        </div>
    </x-slot>
</x-layout>
</body>
</html>