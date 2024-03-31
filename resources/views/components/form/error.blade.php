@props(['messages'])
@if ($messages)
  <ul {{ $attributes->merge(['class' => 'text-xs text-red-600 space-y-1 font-mono mt-12']) }}>
    @foreach ((array) $messages as $message)
      <li>{{ $message }}</li>
    @endforeach
  </ul>
@endif