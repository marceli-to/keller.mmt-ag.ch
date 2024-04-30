<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
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
@vite(['resources/css/app.css'])
</head>
<body class="font-sans h-full antialiased min-h-full px-24 flex items-center justify-center">
  <div class="w-full max-w-sm">
    <div class="bg-white p-24">
      <x-logo class="w-80 h-auto mb-36 ml-auto" />
      {{ $slot }}
    </div>
  </div>
</body>
</html>
