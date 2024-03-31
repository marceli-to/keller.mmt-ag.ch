<x-app-layout>
  @if (auth()->check())
    Hello, {{ auth()->user()->name }}!
  @endif
</x-app-layout>
