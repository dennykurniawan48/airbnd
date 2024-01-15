<div class="w-full px-6 py-4 flex flex-row items-center justify-between">
    <a href="{{route('home')}}" class="flex space-x-4 justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            data-slot="icon" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
        </svg>
        <span class="font-bold text-2xl">AirBnd</span>
    </a>
    @if(Route::currentRouteName() === "home")
    <div class="border border-gray-500 rounded-md flex flex-row">
        <div x-data="{ isOpen: false }" class="relative inline-block px-4 my-3 border-r border-gray-500">
            <div>
                <span x-on:click="isOpen = !isOpen" class="cursor-pointer inline-flex rounded-md shadow-sm w-full">
                    <button type="button" class="">
                        <div class="flex flex-col space-y-1">
                            <span>{{request()->input('country') ?? "Anywhere"}}</span>
                            <div>
                    </button>
                </span>
            </div>
            <template x-if="true">
                <div x-show="isOpen" x-on:click.away="isOpen = false"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                    <!-- Dropdown items -->
                    <div class="py-1 flex-col space-y-2">
                        @foreach($countries as $country)
                        <button onClick="updateCountry('{{$country->name}}')"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <div class="w-full flex justify-between items-center">
                                <span>{{$country->name}}</span>

                            </div>
                        </button>
                        @endforeach
                    </div>
                </div>
            </template>
        </div>
        <div class="flex flex-row">
            <input type="text" id="datepickerheader" class="hidden" />
            <button class="px-4 my-3 border-r border-gray-500" id="anytime">
                @if(request()->input('start') !== null && request()->input('end') !== null)
                {{request()->input('start')}} to {{request()->input('end')}}
                @else
                Anytime
                @endif
            </button>
        </div>
        <div x-data="{ isOpen: false }" class="relative inline-block px-4 my-3">
            <div>
                <span x-on:click="isOpen = !isOpen" class="cursor-pointer inline-flex rounded-md shadow-sm w-full">
                    <button type="button" class="">
                        <div class="flex flex-col space-y-1">
                            <span>{{$adult+$children}} Guest</span>
                            <div>
                    </button>
                </span>
            </div>
            <template x-if="true">
                <div x-show="isOpen" x-on:click.away="isOpen = false"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                    <!-- Dropdown items -->
                    <div class="py-1 flex-col space-y-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <div class="w-full flex justify-between items-center">
                                <span>Adults</span>
                                <div class="flex items-center space-x-2">
                                    <button wire:click="decreaseAdults"
                                        class="rounded-full bg-blue-600 aspect-square p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 fill-white">
                                            <path fill-rule="evenodd"
                                                d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                    <span>{{$adult}}</span>
                                    <button wire:click="increaseAdults()"
                                        class="rounded-full bg-blue-600 aspect-square p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 fill-white">
                                            <path fill-rule="evenodd"
                                                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <div class="w-full flex justify-between items-center">
                                <span>Childrens</span>
                                <div class="flex items-center space-x-2">
                                    <button wire:click="decreaseChildrens()"
                                        class="rounded-full bg-blue-600 aspect-square p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 fill-white">
                                            <path fill-rule="evenodd"
                                                d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                    <span>{{ $children }}</span>
                                    <button wire:click="increaseChildrens()"
                                        class="rounded-full bg-blue-600 aspect-square p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 fill-white">
                                            <path fill-rule="evenodd"
                                                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </template>
        </div>
        <div class="flex justify-center items-center mr-2">
            <button class="p-2 bg-blue-500 rounded-full flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon"
                    class="w-4 h-4 fill-white">
                    <path fill-rule="evenodd"
                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                        clip-rule="evenodd" />
                </svg>

            </button>
        </div>
    </div>
    @endif

    <div class="border rounded-md">
        <div x-data="{ isOpen: false }" class="relative inline-block px-4 my-3">
            <div>
                <span x-on:click="isOpen = !isOpen" class="cursor-pointer inline-flex rounded-md shadow-sm w-full">
                    <button class="px-2 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon"
                            class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            </div>

            <template x-if="true">
                <div x-show="isOpen" x-on:click.away="isOpen = false"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                    <!-- Dropdown items -->
                    <div class="py-1 flex-col space-y-2">
                        @if(auth()->check())
                        <a href="{{route('order')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <div class="w-full flex justify-between items-center">
                                <span>Order</span>
                            </div>
                        </a>
                        <a href="{{route('logout')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <div class="w-full flex justify-between items-center">
                                <span>Logout</span>
                            </div>
                        </a>
                        @else
                        <a href="{{route('login')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <div class="w-full flex justify-between items-center">
                                <span>Login</span>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script type="module">
        document.addEventListener('livewire:initialized', () => {
            const comp = @this;
            var input = document.getElementById('datepickerheader');

            var anytime = document.getElementById('anytime');

            anytime.onclick = function () {
                var datepicker = new HotelDatepicker(input, {
                    format: 'DD-MM-YYYY',
                    onSelectRange: function () {
                        const picked = input.value.split(' - ')
                        const url = new URL(window.location.href)
                        url.searchParams.set("start", picked[0])
                        url.searchParams.set("end", picked[1])
                        window.location.replace(url)

                    }
                });
                datepicker.open()
            };
        });

    </script>
    <script>
        function updateCountry(country) {
            const url = new URL(window.location.href)
            url.searchParams.set("country", country)
            window.location.replace(url)
        }
    </script>

</div>