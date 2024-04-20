@props(['for', 'mandatory' => false])

<label {{ $attributes->twMerge('block text-sm font-medium text-base-content leading-none') }} for="{{ $for }}">
  {{ $slot }}
  @if ($mandatory)
    <span class="text-sm text-error select-none">*</span>
  @endif
</label>
