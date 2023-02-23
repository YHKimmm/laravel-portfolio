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
    @props(['project', 'showBody' => false])
    <div class="p-3">
        <div class="flex justify-between">
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
            <div class="text-xs flex">
                <div class="flex items-center">
                    <a href="/admin/projects/{{ $project->slug }}/edit" class="mr-3">
                        Edit
                        <span class="material-symbols-outlined text-xs">edit</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <form method="POST" action="/admin/projects/{{ $project->slug }}/delete" class="inline">
                        @csrf
                        @method('delete')
                        <a href="/admin/projects/{{ $project->slug }}/delete" class="text-red-600 mr-3">
                            Delete
                            <span class="material-symbols-outlined text-xs">delete</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        @if ($showBody)
            <div class="mt-2">
                {!! $project->body !!}
            </div>
        @endif
    </div>
</body>

</html>
