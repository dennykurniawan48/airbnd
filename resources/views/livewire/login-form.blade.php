<div class="w-full h-screen flex flex-col justify-center items-center">
    <form wire:submit="login" class="text-lg w-80 border border-1 border-gray-500 flex flex-col space-y-3 p-4">
    <div class="flex flex-col space-y-2 mb-2">
        <h2 class="w-full text-center font-bold text-xl">Login</h2>
        <div class="flex flex-row items-center justify-center space-x-2">
            <span class="text-xs">
                Don't have an account? 
            </span>
            <a href="{{route('register')}}" class="flex justify-center items-center">
                <span class="text-xs text-blue-500">Register</span>
            </a>
</div>
        </div>
        @if(session()->has('success'))
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <p>{{session()->get('success')}}</p>
          </div>
        @endif
        <div class="flex border border-1 border-gray-400 rounded-md p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" data-slot="icon" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>

            <input type="text" class="w-full outline-none mx-2" name="email" placeholder="Username"
                wire:model="username" />
        </div>
        <div>@error('username')
            <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="flex border border-1 border-gray-400 rounded-md p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>

            <input type="{{$showPassword ? 'text' : 'password' }}" class="w-full outline-none mx-2" name="password"
                placeholder="Password" wire:model="password" />

            <button type="button" wire:click="setShowPassword">
                @if($showPassword)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" data-slot="icon" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" data-slot="icon" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>

                @endif
            </button>
        </div>
        <div>@error('password')
            <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="w-full flex items-center justify-center">
            <span class="text-red-500">
                {{$error}}
</span>
</div>
        <button class="w-full bg-blue-500 p-2 text-white font-bold mt-2" type="submit">
            Login
        </button>

        <div class="inline-flex w-full justify-center items-center">
            <hr class="w-64 h-1 my-2 bg-gray-200 border-0 rounded dark:bg-gray-700">
            <span class="px-4">OR</span>
            <hr class="w-64 h-1 my-2 bg-gray-200 border-0 rounded dark:bg-gray-700">
        </div>

        <a href="{{route('google.redirect')}}" class="w-full border border-blue-500 p-2 text-blue-500 font-bold mt-2"
            type="submit">
            <div class="w-full text-center">
                Login With Google
            </div>
        </a>
    </form>
</div>