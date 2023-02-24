<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<header class="px-6 py-8">
    <nav class="sm:flex justify-between">
        <div>
            <a href="/" class="text-xs md:text-sm font-bold uppercase">HOME</a>
            <a href="/projects" class="ml-4 text-xs md:text-sm font-bold uppercase">PROJECTS</a>
            <a href="/about" class="ml-4 text-xs md:text-sm font-bold uppercase">ABOUT</a>
        </div>
        <div class="flex items-center">
            @auth
                <span class="text-xs md:text-sm font-bold uppercase">{{ auth()->user()->name }}</span>
                @if (auth()->user()->isAdmin())
                    <a href="/admin" class="ml-4 text-xs md:text-sm font-bold uppercase">Admin</a>
                @endif
                <a href="/logout" class="ml-4 text-xs md:text-sm font-bold uppercase">Logout</a>
            @else
                <a href="/login" class="ml-4 text-xs md:text-sm font-bold uppercase">Log In</a>
            @endauth
        </div>
    </nav>
    @if (session()->has('success'))
        <div class="flex justify-center items-center w-full py-3">
            <p class="text-xs font-bold bg-white uppercase border border-green-700 rounded px-4 py-2">
                {{ session()->get('success') }}
            </p>
        </div>
    @elseif (session()->has('error'))
        <div class="flex justify-center items-center w-full py-3">
            <p class="text-xs color-red-500 font-bold bg-white uppercase border border-red-700 rounded px-4 py-2">
                {{ session()->get('error') }}
            </p>
        </div>
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
</header>


<body class="antialiased">
    <div class="flex justify-center items-center">
        <div class="max-w-7xl w-full px-4 rounded-lg">
            {{ $content }}
        </div>
    </div>
</body>

<x-footer />
