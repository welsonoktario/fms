<x-layouts.app title="Unit Details">
  <div class="flex justify-between w-full items-center">
    <h1 class="text-xl font-semibold">Unit Details</h1>
    <a href="{{ route('units.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
  </div>

  <div class="mt-4 rounded-lg p-4 shadow bg-base-100">
    <table class="table table-auto w-full">
      {{-- <tr>
        <td><img height="10" width="100" src="{{ Storage::url($units->image_unit) }}"></td>
      </tr> --}}
      <tr>
        <th class="text-left">Code Assets:</th>
        <td>{{ $units->asset_code }}</td>
      </tr>
      <tr>
        <th class="text-left">Plate of Unit:</th>
        <td>{{ $units->plate }}</td>
      </tr>
      <tr>
        <th class="text-left">Project:</th>
        <td>{{ $units->project->name }}</td>
      </tr>
    </table>
  </div>
</x-layouts.app>
