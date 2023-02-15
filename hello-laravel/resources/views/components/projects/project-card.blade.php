@props(['project', 'showBody' => false])

<div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
    <div class="text-xl font-bold">
        <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
    </div>
    <div>{!! $project->excerpt!!}</div>
    @if ($showBody)
        <div>{!! $project->body !!}</div>
    @endif
    <footer>
        @if ($project->category)
            <span>Category: <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a> </span>
        @endif
    </footer>
</div>