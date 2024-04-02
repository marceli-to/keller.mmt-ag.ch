<x-app-layout>

  @if (Route::is('post.update'))
    <livewire:post.update_post :post="request()->route('post')" />
  @endif

  @if (Route::is('post.create'))
    <livewire:post.create_post />
  @endif

  @if (Route::is('posts'))
    @if (auth()->check())
      <a href="{{ route('post.create') }}"
        wire:navigate
        class="group relative w-auto inline-flex items-center justify-start px-20 py-10 bg-black text-white text-lg font-bold mb-24">
        Beitrag erstellen
      </a>
    @endif
    <livewire:post.list_posts />
  @endif
    {{-- @if (auth()->check())
      <div x-data="{ hasForm: false }">
        <a href="javascript:;" 
          x-on:click.prevent="hasForm = !hasForm" 
          x-show="!hasForm"
          class="group relative w-auto inline-flex items-center justify-start px-20 py-10 bg-black text-white text-lg font-bold mb-24">
          Beitrag erstellen
        </a>
        <div x-show="hasForm">
        </div>
      </div>
    @endif --}}
  
    


</x-app-layout>