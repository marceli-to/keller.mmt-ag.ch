<article class="mb-32 border-t border-black py-8 {{ !$post->published ? 'opacity-40' : '' }}">
  <div class="font-bold">
    {{ $post->date }}
  </div>
  <div>
    {{ $post->text }}
  </div>
  @if ($post->media)
    @foreach ($post->media as $media)
      <div>
        <img src="/img/small/{{ $media->name }}" alt="{{ $media->name }}" class="w-full max-w-max mt-4">
      </div>
    @endforeach
  @endif 
  @if (auth()->check())
    <footer class="flex mt-24 text-xs space-x-12">
      <a href="javascript:;" 
        wire:click="delete({{ $post->id }})" 
        wire:confirm="Are you sure you want to delete this post?" 
        class="no-underline hover:underline underline-offset-2 decoration-1">
        Löschen
      </a>
      <a href="javascript:;" 
        wire:click="toggle({{ $post->id }})" 
        class="no-underline hover:underline underline-offset-2 decoration-1">
        Publizieren
      </a>
    </footer>
  @endif
</article>