<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @props(['project', 'showBody' => false])
    <div class="p-12 bg-white overflow-hidden shadow sm:rounded-lg">
        <div class="text-xl font-bold">
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        </div>
        <div class="mt-2">{{ $project->excerpt }}</div>
        @if ($showBody)
            <div class="mt-2">
                @foreach (explode('</p>', $project->body) as $paragraph)
                    <p class="my-6">{!! $paragraph !!}</p>
                @endforeach
            </div>
        @endif
    <footer class="mt-5">
        @if ($project->category)
            <span class="text-gray-600">
                <a class="text-xs" href="/categories/{{ $project->category->slug }}">Category: {{ $project->category->name }}</a>
            </span>
        @endif
    </footer>
</div>
</body>
</html>