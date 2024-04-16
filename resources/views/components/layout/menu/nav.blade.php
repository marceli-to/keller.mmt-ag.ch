@props(['class' => ''])
<nav class="mt-50 md:mt-0 text-md md:text-sm font-bold {{ $class }}">
  <ul class="md:flex md:space-x-40">
    {{ $slot }}
  </ul>
</nav>