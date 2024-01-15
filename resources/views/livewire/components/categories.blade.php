<div class="flex flex-row p-6">
    <div class="w-full flex flex-row space-x-8">
        @foreach($data as $d)
        <a href="{{$d->url_slug == '/' ? '/' : '?cat='.$d->url_slug}}" wire:navigate
            class="flex flex-col items-center space-y-3">
            <image src="{{$d->icon}}" class=" h-10 w-10" />

            @if(request()->input('cat') == null && $d->url_slug == "/")
            <span class="text-xs underline font-bold">{{$d->name}}</span>
            @else
            <span class="text-xs {{request()->input('cat') == $d->url_slug ? 'underline font-bold' : ''}}">{{$d->name}}</span>
            @endif
        </a>
        @endforeach
    </div>
</div>