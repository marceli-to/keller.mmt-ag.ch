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
        class="group relative w-auto inline-flex items-center justify-start px-15 py-10 bg-black text-white text-sm font-bold mb-24 mt-20">
        Beitrag erstellen
      </a>
    @endif
    <livewire:post.list_posts />
  @endif
</x-app-layout>
