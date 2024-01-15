<div class="w-full h-screen">
    <livewire:components.header />
    <livewire:components.categories />
    <div class="w-full grid grid-cols-5 gap-x-4 gap-y-8 p-6">
        @foreach($data as $d)
        <a href="/{{$d->slug}}" class="w-full border border-gray-400 p-1 rounded-md">
            <img src="{{$d->image}}" class="w-full aspect-square" />
            <div class="w-full p-3">
                <div class="h-14">
                    <span class="text-md text-gray-700 font-bold">
                        {{$d->name}}
                    </span>
                </div>
                <div class="w-full flex flex-col space-y-3">
                    <span class="text-sm text-gray-500">
                        {{$d->area->name}}, {{$d->area->country->name}}
                    </span>
                    <span class="text-sm text-gray-700">
                        ${{number_format($d->price, 2)}}
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>