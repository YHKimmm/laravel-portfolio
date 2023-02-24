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
            <div
                class="relative flex justify-center max-w-4xl mx-auto h-full bg-gray-100 dark:bg-gray-900 items-center py-6 mt-5 sm:pt-0">
                <div class="max-w-3xl mx-auto mt-5">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center mt-3">Welcome to my
                        Laravel Portfolio project!</h1>
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-8 text-center">Welcome to my
                        portfolio website! My name is Bryaden, I'm a full-stack web developer based in Canada. I
                        specialize in building websites and web applications. I have a passion for constructing
                        aesthetically pleasing, user-friendly, and highly functional websites that leave a lasting
                        impression.</p>
                    <div class="max-w-3xl mx-auto mt-5 text-center">
                        <h2 class="text-2xl text-gray-700 dark:text-gray-300 leading-relaxed mb-8">
                            Here are some of my personal projects:
                        </h2>
                        <ul class="list-none text-left">
                            <li class="mb-2">Apple Market - An e-commerce website selling apple products</li>
                            <li class="mb-2">Bank Management - A web application for managing bank transactions</li>
                            <li class="mb-2">Movie App - A movie review and recommendation website</li>
                            <li class="mb-2">Workout Buddy - A fitness tracking app</li>
                        </ul>
                        <a href="/projects"
                            class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-full text-lg inline-block">View
                            Projects</a>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-layout>
</body>

</html>
