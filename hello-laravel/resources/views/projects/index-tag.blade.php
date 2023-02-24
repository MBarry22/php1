

<x-layout>
    <x-slot name="content">
        <div class=" justify-center text-center	 ">
        @if ($tagname)
            <h2 class="text-3xl">{{$tagname}} </h2>
            <br />
            <a href="/projects">← Back to Projects </a>
            
        @endif
        </div>
    <div
    class="relative flex justify-center min-h-screen sm:items-center py-4 sm:pt-0">
    
    <div class="mt-6">
        <section class="grid grid-cols-1 md:grid-cols-1 gap-2">
            @foreach ($projects as $project)
                    <x-projects.project-card :project="$project" :showImage="true" :showBannerImage="false" :showExcerpt="true" />
            @endforeach
        </section>

    </div>
</div>
    </x-slot>
</x-layout>