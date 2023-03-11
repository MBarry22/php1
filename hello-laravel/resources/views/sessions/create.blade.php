<x-layout>
  <x-slot name="content">
    <main class="max-w-lg mx-auto">
    <div class="bg-white p-8 rounded-lg shadow-lg">
      <h1 class="text-center font-bold text-xl mb-3">Log In</h1>
      <form method="POST" action="/login">
      @csrf
        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
          <input type="email" name="email" id="email" required class="border border-gray-400 rounded p-2 w-full">
            @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
          <input type="password" name="password" id="password" required class="border border-gray-400 rounded p-2 w-full">
            @error('password')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white rounded py-2 px-4">Log In</button>
        </div>
      </form>
      </div>
    </main>
  </x-slot>
</x-layout>
