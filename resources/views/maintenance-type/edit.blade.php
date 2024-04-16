<x-layouts.app>
  <div class="flex gap-x-4 items-center">
    <a href="{{ route('maintenance-types.index') }}" class="btn btn-sm btn-ghost">
      <i class="fa-solid fa-chevron-left"></i>
      Back
    </a>
    <h1 class="text text-xl font-semibold">Maintenance Types - Edit</h1>
  </div>

  {{ $mt }}
</x-layouts.app>
