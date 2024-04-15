<article class="mb-60 last-of-type:mb-0 relative border-t border-black first-of-type:border-0 pt-32 {{ !$post->published ? 'opacity-40' : '' }}">
  @if (auth()->check())
    <header class="flex text-xs space-x-12 absolute left-0 top-10">
      <a href="javascript:;" 
        wire:click="delete({{ $post->id }})" 
        wire:confirm="Are you sure you want to delete this post?" 
        class="no-underline hover:underline underline-offset-2 decoration-1">
        Löschen
      </a>
      <a href="javascript:;" 
        wire:click="toggle({{ $post->id }})" 
        class="no-underline hover:underline underline-offset-2 decoration-1">
        {{ $post->published ? 'Verstecken' : 'Publizieren' }}
      </a>
      <a href="{{ route('post.update', $post) }}"
        wire:navigate
        class="no-underline hover:underline underline-offset-2 decoration-1">
        Bearbeiten
      </a>
    </header>
  @endif
  <div class="font-bold">
    {{ $post->date }}
  </div>
  @if ($post->text)
    <div class="mb-24">
      {{ $post->text }}
    </div>
  @endif
  @if ($post->media)
    @foreach ($post->media->sortBy('order') as $media)
      <div class="mt-32">
        <img src="/img/small/{{ $media->name }}" alt="{{ $media->name }}" class="w-full max-w-lg mt-4">
      </div>
    @endforeach
  @endif 
</article>