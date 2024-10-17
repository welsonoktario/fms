<x-layouts.app title="Unit Details">
  <div class="flex justify-between w-full items-center">
    <h1 class="text-xl font-semibold">Unit Details</h1>
    <a href="{{ route('units.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
  </div>
 <div class="mt-4 rounded-lg p-4 shadow bg-base-100">
    <h3 class="text-lg font-semibold mb-4">Aksi:</h3>
    <div class="flex space-x-4">
        <a href="{{ route('units.show', $units->asset_code) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Detail Unit</a>
        <br>
        <a href="https://www.facebook.com" class="bg-gray-500 text-black px-4 py-2 rounded hover:bg-gray-600 transition" target="_blank" rel="noopener noreferrer">Akun Sosmed Fleet NL</a>
    </div>
</div>
</x-layouts.app>
