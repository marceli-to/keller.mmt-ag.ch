<div class="mb-64 max-w-xl">
  <form wire:submit="save" class="space-y-32" wire:loading.class="opacity-25">
    <div>
      <x-form.label for="date" :value="__('Datum')" />
      <x-form.input 
        wire:model="form.date" 
        id="date" 
        type="date"
        name="name" />
      <x-form.error :messages="$errors->get('form.date')" />
    </div>
    <div>
      <x-form.label for="text" :value="__('Text')" />
      <x-form.text 
        wire:model="form.text" 
        id="text" 
        name="text" />
      <x-form.error :messages="$errors->get('form.text')" />
    </div>
    <div>
      <livewire:dropzone
        wire:model="form.images"
        :rules="['image','mimes:png,jpeg','max:10420']"
        :multiple="true" />
    </div>
    @if ($form->media)
      <div class="flex flex-wrap gap-x-10 gap-y-16 justify-start w-full">
        @foreach($form->media as $media)
          <div class="flex items-start justify-between gap-2 border-b border-black w-full h-auto overflow-hidden">
            <div class="flex items-center gap-8 pb-8">
              <div class="flex-none w-64 h-64">
                <img src="/img/thumbnail/{{ $media->name }}" alt="{{ $media->name }}" class="object-cover w-full h-full">
              </div>
              <div class="flex flex-col items-start gap-4">
                <div class="text-center text-sm">{{ $media->name }}</div>
                <div class="text-center text-gray-400 text-xs">{{ Number::fileSize($media->size) }}</div>
              </div>
            </div>
            <div class="flex items-center mr-4 mt-8">
              <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                  <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
        @endforeach
      </div>
    @endif
    <div>
      <label for="publish" class="flex leading-none items-center">
        <input 
          type="checkbox" 
          id="publish" 
          wire:model="form.published"
          wire:checked="form.published"
          class="appearance-none w-16 h-16 mr-8 ring-0 focus:ring-0 !ring-offset-0 !outline-none border border-black text-black bg-white accent-black" />
        Publizieren
      </label>
    </div>

    <div class="flex justify-between items-center !mt-48">
      <x-buttons.primary type="submit" name="create">
        {{ __('Speichern') }}
      </x-buttons.primary>
      <a href="{{ route('posts') }}"
        wire:navigate 
        class="no-underline hover:underline underline-offset-4 decoration-1 text-sm">
        {{ __('Abbrechen') }}
      </a>
    </div>
  </form>
</div>
