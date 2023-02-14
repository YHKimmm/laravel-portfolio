<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @props(['project'])
<div class="p-10 w-100 sm:w-[60vh] bg-white overflow-hidden shadow sm:rounded-lg">
    <div class="font-bold">
        <a href="/projects/{{ $project['id'] }}">{{ $project['title'] }}</a>
    </div>
    <div>{{ $project['description'] }}</div>
</div>
</body>
</html>