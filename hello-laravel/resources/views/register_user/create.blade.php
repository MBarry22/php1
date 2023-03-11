<x-layout>
  <x-slot name="content">
    <main class="max-w-lg mx-auto mt-10">
      <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-center font-bold text-xl mb-6">Register</h1>
        <form method="POST" action="/register">
          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 font-bold text-gray-700 text-sm">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="border border-gray-400 rounded p-2 w-full">
          </div>
          <div class="mb-6">
            <label for="email" class="block mb-2 font-bold text-gray-700 text-sm">Email</label>
            <input type="email" name="email" id="email" required class="border border-gray-400 rounded p-2 w-full">
            @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="password" class="block mb-2 font-bold text-gray-700 text-sm">Password</label>
            <input type="password" name="password" id="password" required class="border border-gray-400 rounded p-2 w-full">
            @error('password')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 font-bold text-gray-700 text-sm">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="border border-gray-400 rounded p-2 w-full">
            @error('confirmed')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded py-2 px-4">Submit</button>
          </div>
        </form>
      </div>
    </main>
  </x-slot>
</x-layout>
