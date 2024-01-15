<div class="w-full h-screen">
  <livewire:components.header />
  <div class="flex flex-row p-6 space-x-4">
    <div class="w-2/5">
      <img src="{{$property->image}}" value="" class="w-full aspect-square" />
    </div>
    <div class="w-2/5">
      <div class="w-full flex flex-col space-y-8">
        <div class="flex flex-col space-y-2">
          <span class="text-2xl font-bold">{{$property->name}}</span>
          <span>{{$property->area->name}}, {{$property->area->country->name}}</span>
        </div>
        <div>
          @foreach($tabs as $key => $tab)
          <button wire:click="changeTab({{$key}})" class="{{ $selectedTab == $key ? 'bg-blue-500 text-white' : 'bg-white text-slate-700' }} px-3 border border-slate-300 rounded-t-xl">
            {{$tab}}
</button>
@endforeach
        </div>
        @if($selectedTab == 0)
        <div class="flex flex-col space-y-6">
          <div class="flex flex-row space-x-4">
            <image src="/icon/room.svg" class="w-12 h-12" />
            <div class="flex flex-col space-y-1">
              <span>Room in a rental unit</span>
              <span class="text-sm text-gray-600">Your own room in a home, plus access to shared spaces.</span>
            </div>
          </div>
          <div class="flex flex-row space-x-4">
            <image src="/icon/house.svg" class="w-12 h-12" />
            <div class="flex flex-col space-y-1">
              <span>Shared common spaces</span>
              <span class="text-sm text-gray-600">You'll share parts of the home with the Host.</span>
            </div>
          </div>
          <div class="flex flex-row space-x-4">
            <image src="/icon/family.svg" class="w-12 h-12" />
            <div class="flex flex-col space-y-1">
              <span>Large spaces</span>
              <span class="text-sm text-gray-600">Designed for 4 adults and 4 childrens.</span>
            </div>
          </div>
          <div class="flex flex-row space-x-4">
            <image src="/icon/cancel.svg" class="w-12 h-12" />
            <div class="flex flex-col space-y-1">
              <span>Changed your mind?</span>
              <span class="text-sm text-gray-600">You're free to cancel within 48 hours.</span>
            </div>
          </div>
        </div>
        @elseif($selectedTab == 1)
        <div class="flex space-x-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z" />
</svg>
<span>Wifi</span>
      </div>
      <div class="flex space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
</svg>

<span>Kitchen</span>
      </div>
      <div class="flex space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
</svg>

<span>Security camera</span>
      </div>
      <div class="flex space-x-4">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
</svg>


<span>Work Place</span>
      </div>
        @endif
      </div>
    </div>
    <div class="w-1/5 flex flex-col space-y-5">
      <input wire:ignore id="datepicker" class="border border-gray-400 rounded-md px-3 py-1 w-full hidden" />
      <div class="w-full border border-gray-500 rounded-md">
        <div class="px-4 py-2">
          <span class="text-lg">${{number_format($property->price, 2)}} / night<span>
        </div>
        <div class="flex w-full">
          <button class="w-1/2 flex flex-col items-center" id="checkin">
            <span class="text-sm font-semibold pt-2">Check In</span>
            <span class="text-gray-500 text-lg pb-2">
              @if($start) {{$start}} @else dd-mm-yyyy @endif
              <span>
          </button>
          <div class="border-r border-gray-300"></div>
          <button class="w-1/2 flex flex-col items-center" id="checkout">
            <span class="text-sm font-semibold pt-2">Check Out</span>
            <span class="text-gray-500 text-lg pb-2">
              @if($end) {{$end}} @else dd-mm-yyyy @endif
              <span>
          </button>
        </div>
        <div class="w-full">
          <div x-data="{ isOpen: false }" class="w-full relative inline-block text-left">
            <div>
              <span x-on:click="isOpen = !isOpen" class="cursor-pointer inline-flex rounded-md shadow-sm w-full">
                <button type="button"
                  class="w-full inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring focus:border-blue-300 active:bg-gray-50 active:text-gray-800">
                  <div class="flex flex-col space-y-1">
                    <span>Guest</span>
                    <span>{{$adult+$children}} guest</span>
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
                      <button wire:click="decreaseAdults" class="rounded-full bg-blue-600 aspect-square p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                          class="w-4 h-4 fill-white">
                          <path fill-rule="evenodd"
                            d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd" />
                        </svg>

                      </button>
                      <span>{{$adult}}</span>
                      <button wire:click="increaseAdults()" class="rounded-full bg-blue-600 aspect-square p-1">
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
                      <button wire:click="decreaseChildrens()" class="rounded-full bg-blue-600 aspect-square p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                          class="w-4 h-4 fill-white">
                          <path fill-rule="evenodd"
                            d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd" />
                        </svg>

                      </button>
                      <span>{{ $children }}</span>
                      <button wire:click="increaseChildrens()" class="rounded-full bg-blue-600 aspect-square p-1">
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
        </div>

      </div>
      @if($total != 0)
      <div class="w-full flex justify-between">
        <span>{{$nights}} night(s): </span>
        <span>${{number_format($total, 2)}}</span>
      </div>
      @endif
      @if(auth()->check())
      @if($total === 0)
      <button class="w-full bg-gray-400 rounded-md p-3">
        <span class="text-white font-bold">Reserve<span>
      </button>
      @else
      <button class="w-full bg-blue-600 rounded-md p-3" wire:click="checkout">
        <span class="text-white font-bold">Reserve<span>
      </button>
      @endif
      @else
      <button class="w-full {{$total == 0 ? 'bg-gray-400' : 'bg-blue-600'}} rounded-md p-3"
       wire:click="$dispatch('openModal', { component: 'modal.login-modal' })"
       >
       <span class="text-white font-bold">Reserve<span>
      </button>
      @endif
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>

  <script type="module">
    document.addEventListener('livewire:initialized', () => {
      const comp = @this;
      var input = document.getElementById('datepicker');
      var booked = comp.bookedDate

      var checkin = document.getElementById('checkin');
      var checkout = document.getElementById('checkout');


      checkin.onclick = function () {
        var datepicker = new HotelDatepicker(input, {
          format: 'DD-MM-YYYY',
          disabledDates: booked,
          onSelectRange: function () {
            const picked = input.value.split(' - ')
            comp.bookdate(picked[0], picked[1])
            comp.setNights(this.getNights())
          }
        });
        datepicker.open()
      };

      checkout.onclick = function () {
        var datepicker = new HotelDatepicker(input, {
          format: 'DD-MM-YYYY',
          onSelectRange: function () {
            const picked = input.value.split(' - ')
            comp.bookdate(picked[0], picked[1])
            comp.setNights(this.getNights())
          }
        });
        datepicker.open()
      };
    });

  </script>

</div>
