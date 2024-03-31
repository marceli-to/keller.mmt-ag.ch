<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
