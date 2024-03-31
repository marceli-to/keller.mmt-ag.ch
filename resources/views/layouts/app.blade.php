<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-black antialiased min-h-full flex relative">
  @if (auth()->check())
    <livewire:auth.logout />
  @endif
  <main>
    {{ $slot }}
  </main>
</body>
</html>