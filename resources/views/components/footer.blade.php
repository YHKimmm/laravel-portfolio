<footer>
    @if (request()->is('about') || request()->is('/'))
    <div class="flex justify-start pb-4 pl-4 absolute bottom-0"> &copy; {{ date('Y')}} Brayden Kim</div>
    @else
    <div class="flex justify-start p-6"> &copy; {{ date('Y')}} Brayden Kim</div>
    @endif
</footer>