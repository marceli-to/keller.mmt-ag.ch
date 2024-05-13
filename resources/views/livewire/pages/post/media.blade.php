<div class="flex flex-wrap gap-x-10 gap-y-16 justify-start w-full">
  @foreach($mediaItems->sortBy('order') as $key => $media)
    <div class="flex items-start justify-between gap-2 border-b border-black w-full h-auto overflow-hidden">
      <div class="flex items-center gap-8 pb-8">
        <div class="flex-none w-64 h-64">
          <img src="/img/thumbnail/{{ $media->name }}" alt="{{ $media->name }}" class="object-cover w-full h-full">
        </div>
        <div class="flex flex-col items-start gap-4">
          <div class="text-center text-xs">{{ $media->name }}</div>
          <div class="text-center text-gray-400 text-xxs">{{ Number::fileSize($media->size) }}</div>
        </div>
      </div>
      <div class="flex items-center mr-4 mt-8">
        <input 
          type="text"
          :value="{{ $media->order }}"
          wire:blur="order({{ $media->id }}, $event.target.value)"
          class="w-48 h-32 mr-12 border border-black text-black text-center bg-white accent-black" />
        <button 
          type="button"
          wire:click="delete({{ $media->id }})" 
          wire:confirm="Are you sure you want to delete this image?">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
  @endforeach
</div>