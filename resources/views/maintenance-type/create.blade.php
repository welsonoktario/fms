<x-layouts.app title="Create Maintenance Type">
  <div class="flex gap-x-4 items-center">
    <a href="{{ route('maintenance-types.index') }}" class="btn btn-sm btn-ghost">
      <i class="fa-solid fa-chevron-left"></i>
      Back
    </a>
    <h1 class="text text-xl font-semibold">Maintenance Types - Create</h1>
  </div>

  <x-container>
    <form class="space-y-4" action="{{ route('maintenance-types.store') }}" method="POST">
      @csrf

      <div class="space-y-2">
        <x-form-label for="name" mandatory>Maintenance Name</x-form-label>
        <x-form-input name="name" id="name" placeholder="Maintenance Name" required />
      </div>

      <div class="space-y-2">
        <x-form-label for="name" mandatory>Maintenance Duration Type</x-form-label>
        <select name="duration_type" id="duration_type" class="select select-bordered w-full">
          <option value="days">Days</option>
          <option value="weeks">Weeks</option>
          <option value="months">Months</option>
          <option value="years">Years</option>
        </select>
      </div>

      <div class="space-y-2">
        <x-form-label for="name" mandatory>
          Maintenance Duration Value
        </x-form-label>
        <x-form-input type="number" name="duration_value" id="duration_value" placeholder="Maintenance Duration Value"
          required />
      </div>

      <div class="flex justify-end pt-4">
        <button type="submit" class="btn btn-primary">
          <i class="fa-solid fa-plus mr-2"></i>
          Save
        </button>
    </form>
  </x-container>
</x-layouts.app>
