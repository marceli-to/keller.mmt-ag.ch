<header class="bg-white sticky top-0 z-40">
  <div class="h-170 p-20 md:pt-0 md:pl-0 md:pr-0 flex justify-between items-start max-w-[1100px] mx-auto relative">
    <div>
      <x-layout.menu.wrapper>
        <x-layout.menu.item :route="route('posts')" :active="request()->routeIs('posts')">
          Aktuell
        </x-layout.menu.item>
        <x-layout.menu.item :route="route('team')" :active="request()->routeIs('team')">
          Projektteam
        </x-layout.menu.item>
        <x-layout.menu.item :route="route('schedule')" :active="request()->routeIs('schedule')">
          Zeitplan
        </x-layout.menu.item>
        <x-layout.menu.item :route="route('webcam')" :active="request()->routeIs('webcam')">
          Webcam
        </x-layout.menu.item>
      </x-layout.menu.wrapper>
      @if (auth()->check())
        <livewire:auth.logout />
      @endif
      <h1 class="md:ml-20">
        Neubau Keller Druckmesstechnik AG<br>
        Winterthur (2021–2025)
      </h1>
    </div>
    <div class="md:mt-20">
      <x-icons.logo class="block w-140 sm:w-200 h-auto" />
    </div>
  </div>
  <div class="h-1 leading-0 border-t border-black mr-20 max-width-page"></div>
</header>
