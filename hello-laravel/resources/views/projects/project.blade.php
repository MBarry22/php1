

<x-layout>
    <x-slot name="content">
    <div
    class="relative flex justify-center min-h-screen py-4 sm:pt-0">
    <div class="absolute top-4 left-20">
    <a href="/projects">← Back to Projects </a>
    </div>
    <x-projects.project-card :project="$project" :showBody="true"/>
</div>
    </x-slot>
</x-layout>