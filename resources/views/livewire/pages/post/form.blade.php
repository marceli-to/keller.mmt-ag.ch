<div class="mb-64 p-20 lg:px-0 max-w-xl">
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
      <x-form.label for="code" :value="__('Video Code')" />
      <x-form.text 
        wire:model="form.code" 
        id="code" 
        name="code" />
      <x-form.error :messages="$errors->get('form.code')" />
    </div>
    <div>
      <livewire:dropzone
        wire:model="form.images"
        :rules="['image','mimes:png,jpeg','max:10420']"
        :multiple="true" />
    </div>
    @if ($form->media)
      <livewire:post.list_post_media :mediaItems="$form->media" />
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
