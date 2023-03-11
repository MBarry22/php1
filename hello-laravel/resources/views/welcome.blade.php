<x-layout>
  <x-slot name="content">
    <div class="justify-center text-center items-center ">
      @if ($categoryname)
        <h2 class="text-3xl text-deep-mauve">{{$categoryname}}</h2>
        <br />
        <a href="/projects" class="text-charcoal-grey hover:text-deep-mauve transition duration-200">&larr; Back to Projects</a>
      @endif
    </div>

    <div class="relative min-h-screen">
      <!-- Featured Project -->
      <div class="flex justify-center pt-8">
        <h2 class="text-2xl font-bold text-charcoal-grey">Featured Project</h2>
      </div>
      <div class="flex justify-center">
        <x-projects.project-card :project="$projects[3]" :showImage="false" :showBannerImage="true" :showBody="true" class="bg-deep-mauve text-off-white" />
      </div>

      <!-- Other Projects -->
      <div class="flex justify-center py-8">
        <h2 class="text-2xl font-bold text-charcoal-grey">Other Project Summaries</h2>
      </div>
      <div class="flex justify-center">
        <section class="grid grid-cols-1 md:grid-cols-3 gap-2">
          @foreach ($projects as $key => $project)
            @if ($key > 0 && $key <= 3)
              <x-projects.project-card :project="$project" :showImage="false" :showBannerImage="true" class="bg-off-white text-charcoal-grey hover:text-deep-mauve transition duration-200" />
            @endif
          @endforeach
        </section>
      </div>

      <!-- Button to Projects -->
      <div class="flex justify-center py-8">
        <a href="/projects" class="bg-blue-500 hover:bg-blue-700 text-off-white font-bold py-2 px-4 rounded-full transition duration-200">View All Projects</a>
      </div>
    </div>
  </x-slot>
</x-layout>
