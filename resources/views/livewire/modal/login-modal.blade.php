<div class="w-96 h-64 bg-white flex flex-col items-center p-4 justify-between">
    <div class="w-full flex justify-between items-center">
        <span>Require login</span>
        <button wire:click="close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div>
        <span>You need to login or create an account to perform this account.</span>
    </div>
    <div class="flex items-center justify-center space-x-10">
        <button class="py-2 px-4 bg-red-600 text-white rounded-md" wire:click="close">Close</button>
        <a href="{{route('login')}}" class="py-2 px-4 bg-blue-600 text-white rounded-md">Login</a>
    </div>
</div>