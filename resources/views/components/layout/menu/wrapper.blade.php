<a 
  href="javascript:;" 
  x-on:click="menu = ! menu" 
  title="Menü anzeigen"
  class="group flex items-center justify-center w-31 h-23 md:hidden">
  <x-icons.burger class="w-31 h-22 block" />
</a>
<div 
  x-cloak 
  x-show="menu"
  x-transition:enter="opacity ease-in duration-100"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="opacity ease-in duration-0"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="w-full bg-white fixed z-[100] md:z-40 top-0 left-0 p-20 h-full md:!hidden">
  <a 
    href="javascript:;" 
    x-on:click="menu = ! menu" 
    title="Menü verbergen"
    class="group flex items-center justify-center w-31 h-23 md:hidden">
    <x-icons.cross class="w-23 h-23 block" />
  </a>
  <nav class="mt-50 text-md font-bold">
    <ul>
      {{ $slot }}
    </ul>
  </nav>
</div>
<div class="p-20 pt-0">
  <nav class="text-sm font-bold hidden md:block">
    <ul class="flex space-x-40">
      {{ $slot }}
    </ul>
  </nav>
</div>