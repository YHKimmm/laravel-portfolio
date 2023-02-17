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
    <div class="p-12 bg-gray-100 overflow-hidden shadow sm:rounded-lg">
        <div class="text-xl font-bold">
            <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        </div>
        @if ($showBody)
            <img src="{{url('storage/images/project.jfif')}}" class="w-full" alt="">
                <div class="mt-2 flex flex-col gap-2">
                    {!! $project->body !!}
                    {{-- @foreach (explode('</p>', $project->body) as $paragraph)
                        <p class="my-6">{!! $paragraph !!}</p>
                    @endforeach --}}
                </div>
            @else
                <div class="flex items-center">
                    <img src="{{url('storage/images/placeholder-image.png')}}" class="w-[20%] bg-gray-100 py-5 pr-5" alt="">
                    <div class="mt-2">{{ $project->excerpt }}</div>
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