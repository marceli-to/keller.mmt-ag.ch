<!DOCTYPE html>
<html lang="de" class="h-full bg-white">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
</head>
<body class="font-sans text-black antialiased min-h-full relative" x-data="{ menu: false }">
  <x-layout.header />
  <main class="max-w-[1140px] mx-auto">
    {{ $slot }}
  </main>
  @livewireScripts
</body>
</html>