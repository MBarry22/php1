
<x-layout>
    <x-slot name="content">
    <div class="mt-6 justify-center text-start">
        
        <div class="relative flex justify-center  sm:items-center py-4 sm:pt-0">
    
        <section class="grid grid-cols-3 md:grid-cols-3 gap-2 w-3/6 bg-white shadow sm:rounded-lg text-center ">
            <div class="text-2xl justify-center text-center">Projects</div>
            <p></p>
            <div class="text-lg justify-center text-center"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-38 justify-center text-center">Create Project!</button></div>
            
            @foreach ($projects as $project)
            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a> 

            <a  href="/projects/{{ $project->id }}/edit">EDIT [{{$project->title}}]</a>
            <a class="text-red-700" href="/projects/{{ $project->id }}/delete">DELETE [{{$project->title}}]</a>
            @endforeach
        </section>
        <br />
        
        <br />
        

    </div>

    <div class="relative flex justify-center  sm:items-center py-4 sm:pt-0">

    
        <section class="grid grid-cols-3 md:grid-cols-3 gap-2 w-3/6 bg-white shadow sm:rounded-lg text-center">
        <div class="text-2xl justify-center text-center">Users</div>
        <p></p>
        <div class="text-lg justify-center text-center"><div class="text-lg justify-center text-center"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-38 justify-center text-center">Create User!</button></div></div>
            @foreach ($users as $user)
            <a href="/projects/{{ $project->id }}">{{ $user->name }}</a>
            <a href="/projects/{{ $project->id }}/edit">Edit User "{{$user->name}}"</a>
            <a class="text-red-700" href="/projects/{{ $project->id }}/delete">Delete User "{{$user->name}}"</a>
            @endforeach
        </section>
        </div>
</div>
</div>
    </x-slot>
</x-layout>