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
            @if ($project->image)
                <img src="{{ url('storage/' . $project->image) }}" class="w-full h-auto object-cover sm:w-auto sm:h-auto"
                    alt="">
            @else
                <img src="{{ url('storage/images/showcaseimage.png') }}"
                    class="w-full h-auto object-cover sm:w-auto sm:h-auto" alt="">
            @endif
            <div class="mt-2 flex flex-col gap-2">
                {!! $project->body !!}
            </div>
        @else
            <div class="flex items-center">
                @if ($project->thumb)
                    <img src="{{ url('storage/' . $project->thumb) }}"
                        class="w-full h-auto object-cover sm:w-1/3 sm:h-auto bg-gray-100 py-5 pr-5" alt="">
                @else
                    <img src="{{ url('storage/images/No-Image-Placeholder.png') }}"
                        class="w-auto max-h-auto object-cover sm:w-1/3 sm:h-auto bg-gray-100 py-5 pr-5" alt="">
                @endif
                <div class="mt-2 hidden sm:block">{{ $project->excerpt }}</div>
            </div>
        @endif
        <footer class="mt-5">
            {{-- Cateogry --}}
            <section>
                @if ($project->category)
                    <span class="text-gray-600">
                        <a class="text-xs" href="/projects/categories/{{ $project->category->slug }}">Category:
                            {{ $project->category->name }}</a>
                    </span>
                @endif
            </section>
            {{-- Tag --}}
            <section>
                @if (count($project->tags))
                    <span class="text-gray-600 text-xs">Tags:
                        @foreach ($project->tags as $tag)
                            <a class="text-xs" href="/projects/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                        @endforeach
                    </span>
                @endif
            </section>
        </footer>
    </div>
</body>

</html>
