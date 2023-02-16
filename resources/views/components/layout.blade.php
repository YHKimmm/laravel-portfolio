<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<header class="px-6 py-8">
    <nav class="flex justify-between items-center">
        <div><a href="/" class="text-s font-bold uppercase">HOME</a></div>
        <div class="md:mt-0">
            <a href="/projects" class="ml-3 text-xs font-bold uppercase">PROJECTS</a>
            <a href="/about" class="ml-3 text-xs font-bold uppercase">ABOUT</a>
        </div>
    </nav>
    <script src="https://cdn.tailwindcss.com"></script>
</header>


<body class="antialiased">
    <div
        class="relative flex items-top justify-center mt-2 sbg-gray-100 dark:bg-gray-900 py-4">
        {{$content}}
    </div>
</body>

<x-footer />
