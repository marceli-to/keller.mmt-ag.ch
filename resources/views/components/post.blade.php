<article class="mb-40 last-of-type:mb-0 relative border-t border-black first-of-type:border-0 pt-24 {{ !$post->published ? 'opacity-40' : '' }}">
  <div class="font-bold text-xs">
    {{ $post->dateString }}
  </div>
  @if ($post->text)
  <div class="text-base md:text-lg max-w-xl mt-4">
      {{ $post->text }}
    </div>
  @endif
  @if ($post->code)
  <div class="mt-16 max-w-xl">
    <div class="w-full [&>iframe]:aspect-video [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:object-cover">
      {!! $post->code !!}
    </div>
  </div>
  @endif
  @if ($post->media)
    <div class="space-y-20 mt-16">
      @foreach ($post->media->sortBy('order') as $media)
        <figure>
          <img src="/img/large/{{ $media->name }}" alt="{{ $media->name }}"  width="{{ $media->width }}" height="{{ $media->height }}" class="w-full max-w-xl mt-4">
        </figure>
      @endforeach
    </div>
  @endif
  @if (auth()->check())
  <footer class="flex justify-end w-full text-xxs space-x-12 py-10 absolute left-0 -bottom-40">
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