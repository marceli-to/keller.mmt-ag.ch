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
      <a href="" 
        x-on:click.prevent="hasForm = false"
        class="no-underline hover:underline underline-offset-4 decoration-1 text-sm">
        {{ __('Abbrechen') }}
      </a>
    </div>
  </form>
</div>