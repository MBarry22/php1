<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://cdn.tailwindcss.com"></script>
    
    <body class="antialiased " >
        <x-header />

        {{$content}}
        <x-footer />
    </body>
</html>