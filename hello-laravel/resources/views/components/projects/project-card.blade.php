@props(['project', 'showBody' => true])

<div class="p-4  bg-white overflow-hidden shadow sm:rounded-lg w-96 ">
    <div class="text-xl font-bold">
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
    </div>
    
    <div>{!! $project->excerpt!!}</div>
    <br />
    @if ($showBody)
        <div class="truncate w-96 h-24">{!! $project->body !!}</div> <br />
    @endif
    <footer>
        @if ($project->category)
            <span>Category: <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a> </span>
        @endif
    </footer>
</div>