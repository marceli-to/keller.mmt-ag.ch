<button {{ $attributes->merge(['type' => 'submit', 'name' => '', 'class' => 'group relative w-auto flex items-center justify-start px-20 py-10 bg-black text-white text-lg font-bold']) }}>
  {{ $slot }}
</button>
