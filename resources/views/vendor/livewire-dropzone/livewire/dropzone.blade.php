<div
    x-cloak
    x-data="dropzone({
        _this: @this,
        multiple: @js($multiple)
    })"
    @dragenter.prevent.document="onDragenter($event)"
    @dragleave.prevent="onDragleave($event)"
    @dragover.prevent="onDragover($event)"
    @drop.prevent="onDrop"
    class="w-full antialiased"
>
    <div class="flex flex-col items-start h-full w-full max-w-2xl justify-center bg-white">
        @if(! is_null($error))
            <div class="bg-red-100 p-4 w-full mb-4 rounded">
                <div class="flex gap-3 items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-red-400">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                    <h3 class="text-sm text-red-800">{{ $error }}</h3>
                </div>
            </div>
        @endif
        <div class="flex justify-between w-full">
            <label for="upload" class="block text-black mb-8">
              {{ __('Bilder') }}
            </label>
            <div x-show="isLoading" role="status">
                <svg aria-hidden="true" class="w-20 h-20 text-gray-200 animate-spin fill-black" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                  <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
        </div>
        <div @click="$refs.input.click()" class="border border-black w-full cursor-pointer">
            <div>
                <div class="flex items-center justify-center gap-2 py-24 h-full" :class="isDragging ? 'bg-yellow-200' : 'bg-white'">
                  <div>Drop here or browse files</div>
                </div>
            </div>
            <input
              x-ref="input"
              wire:model="upload"
              type="file"
              class="hidden"
              x-on:livewire-upload-start="isLoading = true"
              x-on:livewire-upload-finish="isLoading = false"
              x-on:livewire-upload-error="console.log('livewire-dropzone upload error', error)"
              @if(! is_null($this->accept)) accept="{{ $this->accept }}" @endif
              @if($multiple === true) multiple @endif
            >
        </div>

        <div class="flex items-center gap-6 text-xxs justify-end w-full mt-6">
            @php
              $hasMaxFileSize = ! is_null($this->maxFileSize);
              $hasMimes = ! empty($this->mimes);
            @endphp

            @if($hasMaxFileSize)
              <div>{{ __('Max. :size', ['size' => Number::fileSize($this->maxFileSize * 1024)]) }}</div>
            @endif

            @if($hasMaxFileSize && $hasMimes)
              <span class="w-3 h-3 bg-black rounded-full"></span>
            @endif

            @if($hasMimes)
              <div>{{ Str::upper($this->mimes) }}</div>
            @endif
        </div>


        @if($files && count($files) > 0)
          <div class="flex flex-wrap gap-x-10 gap-y-16 border-t pt-8 border-black justify-start w-full mt-24">
              @foreach($files as $file)
                  <div class="flex items-start justify-between gap-2 border-b border-black w-full h-auto overflow-hidden">
                      <div class="flex items-center gap-8 pb-8">
                          @if($this->isImageMime($file['extension']))
                              <div class="flex-none w-64 h-64">
                                  <img src="{{ $file['temporaryUrl'] }}" class="object-cover w-full h-full" alt="{{ $file['name'] }}">
                              </div>
                          @else
                              <div class="flex justify-center items-center w-14 h-14 bg-gray-100">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                  </svg>
                              </div>
                          @endif
                          <div class="flex flex-col items-start gap-4">
                              <div class="text-center text-xs">{{ $file['name'] }}</div>
                              <div class="text-center text-gray-400 text-xxs">{{ Number::fileSize($file['size']) }}</div>
                          </div>
                      </div>
                      <div class="flex items-center mr-4 mt-8">
                          <button type="button" @click="removeUpload('{{ $file['tmpFilename'] }}')">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                  <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                              </svg>
                          </button>
                      </div>
                  </div>
              @endforeach
          </div>
        @endif
    </div>

  @script
    <script>
      Alpine.data('dropzone', ({ _this, multiple }) => {
        return ({
          isDragging: false,
          isDropped: false,
          isLoading: false,

          onDrop(e) {
            this.isDropped = true
            this.isDragging = false

            const file = multiple ? e.dataTransfer.files : e.dataTransfer.files[0]

            const args = ['upload', file, () => {
                // Upload completed
                this.isLoading = false
            }, (error) => {
                // An error occurred while uploading
                console.log('livewire-dropzone upload error', error);
            }, () => {
                // Uploading is in progress
                this.isLoading = true
            }];

            // Upload file(s)
            multiple ? _this.uploadMultiple(...args) : _this.upload(...args)
          },
          onDragenter() {
            this.isDragging = true
          },
          onDragleave() {
            this.isDragging = false
          },
          onDragover() {
            this.isDragging = true
          },
          removeUpload(tmpFilename) {
            // Dispatch an event to remove the temporarily uploaded file
            _this.dispatch('{{ $uuid }}:fileRemoved', { tmpFilename })
          },
        });
      })
    </script>
  @endscript
</div>