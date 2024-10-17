<x-layouts.app title="Unit Details">
  <!-- Sticky Header Section -->
  <div class="flex justify-between w-full items-center bg-white p-4 shadow-md sticky top-0 z-10">
    <h1 class="text-xl font-semibold">Unit Details</h1>
    <a href="{{ route('units.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
  </div>

  <!-- Main Content Section -->
  <div class="mt-4 rounded-lg p-4 shadow bg-base-100 overflow-x-auto">
    <table class="table table-auto w-full">
      <!-- Image Section -->
      <tr>
        <td colspan="2" class="text-center">
          <img class="max-w-full h-auto" style="max-height: 200px;" src="{{ Storage::url($units->image_unit) }}">
        </td>
      </tr>
      <!-- Status Units -->
      <tr>
        <th class="text-left">Status Units:</th>
        <td class="text-red-500">{{ $units->status }}</td>
      </tr>
      <!-- Code Assets -->
      <tr>
        <th class="text-left">Code Assets:</th>
        <td>{{ $units->asset_code }}</td>
      </tr>
      <!-- Name Of Unit -->
      <tr>
        <th class="text-left">Name Of Unit:</th>
        <td>{{ $units->name }}</td>
      </tr>
      <!-- Type -->
      <tr>
        <th class="text-left">Type:</th>
        <td>{{ $units->type }}</td>
      </tr>
      <!-- Project Location -->
      <tr>
        <th class="text-left">Project Location:</th>
        <td>{{ $units->project->name }}</td>
      </tr>
      <!-- Plate -->
      <tr>
        <th class="text-left">Plate:</th>
        <td>{{ $units->plate }}</td>
      </tr>
      <!-- Year Of Manufacturing -->
      <tr>
        <th class="text-left">Year Of Manufacturing:</th>
        <td>{{ $units->year }}</td>
      </tr>
      <!-- KM / HM -->
      <tr>
        <th class="text-left">KM / HM:</th>
        <td>{{ $units->meter }}</td>
      </tr>
      <!-- Colour -->
      <tr>
        <th class="text-left">Colour:</th>
        <td>{{ $units->colour }}</td>
      </tr>
      <!-- Chassis Number -->
      <tr>
        <th class="text-left">Chassis Number:</th>
        <td>{{ $units->chassis_number }}</td>
      </tr>
      <!-- Engine Number -->
      <tr>
        <th class="text-left">Engine Number:</th>
        <td>{{ $units->engine_number }}</td>
      </tr>
      <!-- Engine Model -->
      <tr>
        <th class="text-left">Engine Model:</th>
        <td>{{ $units->engine_model }}</td>
      </tr>
      <!-- Engine Type -->
      <tr>
        <th class="text-left">Engine Type:</th>
        <td>{{ $units->engine_type }}</td>
      </tr>
      <!-- Tax Due Date -->
      <tr>
        <th class="text-left">Tax Duedate:</th>
        <td>{{ date('F j, Y', strtotime($units->unit_tax_duedate)) }}</td>
      </tr>
    </table>
  </div>
</x-layouts.app>
