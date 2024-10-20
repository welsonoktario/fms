<x-layouts.app title="Unit Details">
  <div class="flex justify-between w-full items-center bg-white p-4 shadow-md sticky top-0 z-10">
    <h1 class="text-xl font-semibold">Unit Details</h1>
    <a href="{{ route('units.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
  </div>

  <div class="mt-4 rounded-lg p-4 shadow bg-base-100 overflow-x-auto">
    <table class="table table-auto w-full">
      <tr>
        <td colspan="2" class="text-center">
          <img class="max-w-full h-auto" style="max-height: 200px;" src="{{ Storage::url($units->image_unit) }}">
        </td>
      </tr>
      <tr>
        <th class="text-left">Status Units:</th>
        <td class="text-red-500">{{ $units->status }}</td>
      </tr>
      <tr>
        <th class="text-left">Code Assets:</th>
        <td>{{ $units->asset_code }}</td>
      </tr>
      <tr>
        <th class="text-left">Name Of Unit:</th>
        <td>{{ $units->name }}</td>
      </tr>
      <tr>
        <th class="text-left">Type:</th>
        <td>{{ $units->type }}</td>
      </tr>
      <tr>
        <th class="text-left">Project Location:</th>
        <td>{{ $units->project->name }}</td>
      </tr>
      <tr>
        <th class="text-left">Plate:</th>
        <td>{{ $units->plate }}</td>
      </tr>
      <tr>
        <th class="text-left">Year Of Manufacturing:</th>
        <td>{{ $units->year }}</td>
      </tr>
      <tr>
        <th class="text-left">KM / HM:</th>
        <td>{{ $units->meter }}</td>
      </tr>
      <tr>
        <th class="text-left">Colour:</th>
        <td>{{ $units->colour }}</td>
      </tr>
      <tr>
        <th class="text-left">Chassis Number:</th>
        <td>{{ $units->chassis_number }}</td>
      </tr>
      <tr>
        <th class="text-left">Engine Number:</th>
        <td>{{ $units->engine_number }}</td>
      </tr>
      <tr>
        <th class="text-left">Engine Model:</th>
        <td>{{ $units->engine_model }}</td>
      </tr>
      <tr>
        <th class="text-left">Engine Type:</th>
        <td>{{ $units->engine_type }}</td>
      </tr>
      <tr>
        <th class="text-left">Tax Duedate:</th>
        <td>{{ date('F j, Y', strtotime($units->unit_tax_duedate)) }}</td>
      </tr>
    </table>
  </div>
</x-layouts.app>
