<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
<link href="/build/assets/app-3EsI-786.css" rel="stylesheet"/>
        <link href="/build/assets/app-5_kuDfP4.css" rel="stylesheet" />
        <style>
  [x-cloak] { 
      display: none !important;
   }
</style>
        <title>{{ $title ?? 'Airbnd' }}</title>
        @livewireStyles
    </head>
    <body>
        {{ $slot }}
        <script src="/build/assets/app-cP8A0vE5.js"></script>
        @livewireScripts
        @livewire('wire-elements-modal')
    </body>
</html>
