<!DOCTYPE html>
<html lang="de" class="h-full bg-white overflow-y-scroll">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
</head>
<body class="font-sans text-black antialiased min-h-full relative" x-data="{ menu: false }">
  <x-layout.header />
  <main class="max-w-[1100px] mx-auto px-20 xl:px-0 pb-32">
    {{ $slot }}
  </main>
  @livewireScripts
</body>
</html>