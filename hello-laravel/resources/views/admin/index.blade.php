<x-layout>
    <x-slot name="content">
        <div class="flex justify-center items-center h-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-3/4">
                <section class="bg-white shadow rounded-lg p-4">
                    <div class="text-2xl text-center font-bold mb-4">Projects</div>
                    <div class="flex justify-end mb-4">
                        <a href="/admin/projects/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full text-center">Create Project</a>
                    </div>
                    <hr class="my-4">
                    @foreach ($projects as $project)
                    <div class="flex items-center justify-between mb-2">
                        <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a> 
                        <div>
                            <a href="/admin/projects/{{ $project->id }}/edit" class="text-gray-500 hover:text-gray-700">Edit</a>
                            <span class="mx-1">|</span>
                            <form method="POST" action="/admin/projects/{{$project->id}}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </section>
                <section class="bg-white shadow rounded-lg p-4">
                    <div class="text-2xl text-center font-bold mb-4">Users</div>
                    <div class="flex justify-end mb-4">
                        <a href="/admin/users/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full text-center">Create User</a>
                    </div>
                    <hr class="my-4">
                    @foreach ($users as $user)
                    <div class="flex items-center justify-between mb-2">
                        <a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a>
                        <div>
                            <a href="/admin/users/{{ $user->id }}/edit" class="text-gray-500 hover:text-gray-700">Edit</a>
                            <span class="mx-1">|</span>
                            <form method="POST" action="/admin/users/{{$user->id}}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </section>

                <section class="bg-white shadow rounded-lg p-4">
                    <div class="text-2xl text-center font-bold mb-4">Categories</div>
                    <div class="flex justify-end mb-4">
                        <a href="/admin/categories/create" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full text-center">Create Category</a>
                    </div>
                    <hr class="my-4">
                    @foreach ($categories as $category)
                    <div class="flex items-center justify-between mb-2">
                        <a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a>
                        <div>
                            <a href="/admin/categories/{{ $category->id }}/edit" class="text-gray-500 hover:text-gray-700">Edit</a>
                            <span class="mx-1">|</span>
                            <form method="POST" action="/admin/categories/{{$category->id}}/delete" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </section>
            </div>
        </div>
    </x-slot>
</x-layout>
