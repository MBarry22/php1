<x-layout>
    <x-slot name="content">
        
    <div class="flex justify-center items-center h-full">
    @if ($user)
        <h1 class="text-center font-bold text-xl mb-3">Edit User: {{ $user->name }}</h1>
        <form method="POST" action="/admin/users/{{ $user->id }}/edit" enctype="multipart/form-data">
            @method('PATCH')
    @else
            <h1 class="text-center font-bold text-xl mb-3">Create User</h1>
            <form method="POST" action="/admin/users/create" enctype="multipart/form-data">
    @endif
        <div class="w-full max-w-md">
            <h1 class="text-center font-bold text-xl mb-6">Create User</h1>
            <form method="POST" action="/admin/users/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-2 font-bold text-gray-700 ">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="border border-gray-400 rounded p-2 w-full">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 font-bold text-gray-700">Email</label>
                    <textarea name="email" id="email" required
                        class="border border-gray-400 rounded p-2 w-full">{{ old('email')  }}</textarea>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 font-bold text-gray-700">Password</label>
                    <textarea name="password" id="password" required
                        class="border border-gray-400 rounded p-2 w-full">{{ old('password') }}</textarea>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Create</button>
                </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>

