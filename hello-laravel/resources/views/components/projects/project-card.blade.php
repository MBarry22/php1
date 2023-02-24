@props(['project', 'showBody' => false, 'showImage' => false, 'showBannerImage' => true, 'showExcerpt' => false])

<div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg w-4/6 mx-auto my-10">
    <div class="text-xl font-bold flex justify-between items-center">
        <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        @if ($showImage)
            @if($project->thumb != NULL)
                <img src="{{url('storage/' . $project->thumb )}}" alt="Thumbnail" class="w-16 h-16">
            @endif
            @if ($project->thumb == NULL)
                <img src="{{url('storage/images/programming_lang.jpg')}}" alt="Image" class="w-16 h-16" />
            @endif
        @endif
    </div>
    @if($showBannerImage)
        <div class="my-4">
            @if($project->image != NULL)
                <img src="{{url('storage/' . $project->image )}}" alt="" class="w-full h-auto">
            @endif
            @if ($project->image == NULL)
                <img src="{{url('storage/images/programming_lang.jpg')}}" alt="Image" class="w-full h-auto" />
            @endif
        </div>
    @endif
    @if ($showExcerpt)
        <div class="text-gray-500">
            {!! $project->excerpt !!}
        </div>
    @endif
    @if ($showBody)
        <div class="py-2">
            {!! $project->body !!}
        </div>
    @endif
    <footer class="mt-4">
        @if ($project->category)
            <span>Category: <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a></span>
        @endif
        @if ($project->tags->count())
            <div class="flex flex-wrap mt-2">
                @foreach ($project->tags as $tag)
                    <a href="/tags/{{ $tag->slug }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</a>
                @endforeach
            </div>
        @endif
    </footer>
</div>
