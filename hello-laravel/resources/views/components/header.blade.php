<header class="px-6 py-4 w-full h-fit">
    <nav class="flex justify-between items-end">
    
        <div><a href="/" class="text-s font-bold uppercase">Home</a>
                <a href="/projects" class="ml-4 text-xs font-bold uppercase">Projects</a>
                <a href="/about" class="ml-4 text-xs font-bold uppercase">About</a></div>
        

        <div class="mt-4 md:mt-0">
            @auth
                <span class="text-xs font-bold uppercase"> {{ auth()->user()->name }} </span>
                <a href="/logout" class="ml-3 text-xs font-bold uppercase">Logout</a>
                @if (auth()->user()->isAdmin())
                    <a href="/admin/projects" class="ml-4 text-s font-bold uppercase">Admin</a>
                @endif
            @else
                <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
            @endauth
        </div>
    </nav>
    <br />
    @if (session()->has('success'))
        <div class="md:flex md:justify-center md:items-center">
            <p class="text-xs font-bold uppercase border border-green-700 rounded px-4 py-2">
                {{ session()->get('success')}}
            </p>
        </div>
        
    @elseif (session()->has('error'))
        <div class="flex justify-center items-center bg-gray-100 w-full py-3">
            <p class="text-xs color-red-500 font-bold bg-white uppercase border border-red-700 rounded px-4 py-2">
                {{ session()->get('error') }}
            </p>
        </div>

    @endif
        
</header>