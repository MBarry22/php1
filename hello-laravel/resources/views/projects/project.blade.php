

<x-layout>
    <x-slot name="content">
    <div
    class="relative flex justify-center min-h-screen py-4 sm:pt-0">
    <div class="absolute top-4 left-20">
    <a href="/projects">← Back to Projects </a>
    </div>
    <div class="mt-2">
        <section class="w-96 h-36 bg-white shadow sm:rounded-lg">
        <h2 class="text-3xl">{{ $project['title'] }}</h2>
        <p>{{ $project['description'] }}</p>
        </section>
    </div>
</div>
    </x-slot>
</x-layout>