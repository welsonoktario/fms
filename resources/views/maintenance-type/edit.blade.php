<x-layouts.app title="Edit Maintenance Type">
  <div class="flex gap-x-4 items-center">
    <a href="{{ route('maintenance-types.index') }}" class="btn btn-sm btn-ghost">
      <i class="fa-solid fa-chevron-left"></i>
      Back
    </a>
    <h1 class="text text-xl font-semibold">Maintenance Types - Create</h1>
  </div>

  <x-container>
    <form class="space-y-4" action="{{ route('maintenance-types.update', $mt->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="space-y-2">
        <x-form-label for="name" mandatory>Maintenance Name</x-form-label>
        <x-form-input name="name" id="name" placeholder="Maintenance Name" value="{{ $mt->name }}"
          required />
      </div>

      <div class="space-y-2">
        <x-form-label for="name" mandatory>Maintenance Duration Type</x-form-label>
        <select name="duration_type" id="duration_type" class="select select-bordered w-full">
          <option value="days" @selected($mt->duration_type == 'days')>Days</option>
          <option value="weeks" @selected($mt->duration_type == 'weeks')>Weeks</option>
          <option value="months" @selected($mt->duration_type == 'months')>Months</option>
          <option value="years" @selected($mt->duration_type == 'years')>Years</option>
        </select>
      </div>

      <div class="space-y-2">
        <x-form-label for="name" mandatory>
          Maintenance Duration Value
        </x-form-label>
        <x-form-input type="number" name="duration_value" id="duration_value" placeholder="Maintenance Duration Value"
          min="1" value="{{ $mt->duration_value }}" required />
      </div>

      <div class="flex justify-end pt-4">
        <button type="submit" class="btn btn-primary">
          <i class="fa-regular fa-save mr-1"></i>
          Edit
        </button>
    </form>
  </x-container>
</x-layouts.app>
