@props(['project', 'showBody' => false , 'showImage' => false , 'showBannerImage' => true])

<div class="p-4  bg-white overflow-hidden shadow sm:rounded-lg w-3/6 ">
    <div class="text-xl font-bold">
        <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
        @if ($showImage)
            <img src="{{url('storage/images/php.png')}}" alt="placeholder" class="w-6 h-6" />
        @endif
        @if($showBannerImage)
            <br />
            <br />
            <img class="justify-center text-center " src="{{url('storage/images/programming_lang.jpg')}}" alt="placeholder"  />
        @endif
    </div>
    
    <div>{!! $project->excerpt!!}</div>
    <br />
    @if ($showBody)
        <div>{!! $project->body !!}</div> <br />
    @endif
    <footer>
        @if ($project->category)
            <span>Category: <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a> </span>
        @endif
    </footer>
</div>