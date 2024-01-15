<div class="w-full h-screen">
    <livewire:components.header />
    <div class="w-full grid grid-cols-5 gap-x-4 gap-y-8 p-6">
        @foreach($orders as $order)
        <div class="w-full flex flex-col">
            <img src="{{$order->property->image}}" class="w-full aspect-square">
            <div class="w-full py-3">
                <div class="h-14">
                    <span class="text-md text-gray-700 font-bold">
                        {{$order->property->name}}
                    </span>
                </div>
                <div class="w-full flex flex-col space-y-3">
                    <span class="text-sm text-gray-500">
                        {{$order->property->area->name}}, {{$order->property->area->country->name}}
                    </span>
                    <span class="text-sm text-gray-500">
                        {{$order->start}} to {{$order->end}}
                    </span>
                    <span class="text-sm text-gray-700">
                        Total: <span class="font-bold">${{number_format($order->total, 2)}}</span>
                    </span>
                </div>
            </div>
            <a href="/{{$order->property->slug}}" wire:navigate>
                <button class="w-full bg-blue-500 text-white p-2">
                    <span>Visit</span>
                </button>
            </a>
        </div>
        @endforeach
    </div>
</div>