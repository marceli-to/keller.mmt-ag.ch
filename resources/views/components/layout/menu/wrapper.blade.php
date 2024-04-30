<a 
  href="javascript:;" 
  x-on:click="menu = ! menu" 
  title="Menü anzeigen"
  class="group flex items-center justify-center w-30 h-21 md:hidden">
  <x-icons.burger class="w-30 h-21 block" />
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
    class="group flex items-center justify-center w-30 h-21 md:hidden">
    <x-icons.cross class="w-21 h-21 block" />
  </a>
  <nav class="mt-50 text-md font-bold">
    <ul>
      {{ $slot }}
      @if (auth()->check())
      <livewire:auth.logout />
      @endif
    </ul>
  </nav>
</div>
<div class="p-20 xl:px-0 pt-0">
  <nav class="text-base md:text-xs font-bold hidden md:block">
    <ul class="flex space-x-40">
      {{ $slot }}
      @if (auth()->check())
        <livewire:auth.logout />
      @endif
    </ul>
  </nav>
</div>