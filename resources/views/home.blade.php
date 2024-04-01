<x-app-layout>

  @if (auth()->check())
    <div x-data="{ hasForm: false }">
      <a href="javascript:;" 
        x-on:click.prevent="hasForm = !hasForm" 
        x-show="!hasForm"
        class="group relative w-auto inline-flex items-center justify-start px-20 py-10 bg-black text-white text-lg font-bold mb-24">
        Beitrag erstellen
      </a>
      <div x-show="hasForm">
        <livewire:post.create_post />
      </div>
    </div>
  @endif
 
  <livewire:post.list_posts />


  {{-- @if (Route::is('post.update'))
    <livewire:post.update_post :post="request()->route('post')" />
  @endif --}}


</x-app-layout>
