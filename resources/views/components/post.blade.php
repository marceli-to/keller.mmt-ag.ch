<article class="mb-40 last-of-type:mb-0 relative border-t border-black first-of-type:border-0 pt-24 {{ !$post->published ? 'opacity-40' : '' }}">
  <div class="font-bold mb-12">
    {{ $post->date }}
  </div>
  @if ($post->text)
  <div class="mb-24 text-base md:text-lg max-w-xl">
      {{ $post->text }}
    </div>
  @endif
  @if ($post->media)
    <div class="space-y-20 {{ !$post->text ? 'mt-24' : '' }}">
      @foreach ($post->media->sortBy('order') as $media)
        <figure>
          <img src="/img/large/{{ $media->name }}" alt="{{ $media->name }}" class="w-full max-w-xl mt-4">
        </figure>
      @endforeach
    </div>
  @endif
  @if (auth()->check())
  <footer class="flex text-xs space-x-12 absolute left-0 -bottom-40">
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
  </footer>
@endif
</article>