<x-layouts.app title="Unit Details">
  <div class="flex justify-between w-full items-center">
    <h1 class="text-xl font-semibold">Unit Details</h1>
    <a href="{{ route('units.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow bg-base-100">
    <a href="{{ route('units.show', $units->asset_code) }}">Detail Unit</a>
    <a href="{{ route('#', $units->asset_code) }}">TESTING</a>
  </div>
</x-layouts.app>
