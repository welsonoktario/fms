<x-layouts.app title="Create Driver">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <div class="flex gap-x-4 items-center">
    <a href="{{ route('drivers.index') }}" class="btn btn-sm btn-ghost">
      <i class="fa-solid fa-chevron-left"></i>
      Back
    </a>
    <h1 class="text text-xl font-semibold">Driver - Create</h1>
  </div>
  <form action="{{ route('drivers.store') }}" method="POST">
    @csrf

    @if ($errors->any())
      <div class="alert alert-danger text-red-600 text-sm mt-1">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="space-y-4">
      <div>
        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Identification Number (NIK):</label>
        <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Input Employee Identification Number (NIK)" required>
        @error('nik')
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name of Driver:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Input Name of Driver" required>
        @error('name')
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Input Phone Number of Driver" required>
        @error('phone_number')
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="provider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Provider:</label>
        <select id="provider" name="provider" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
          <option value="" disabled selected>Choose Provider</option>
          <option value="TELKOMSEL" {{ old('provider') == 'TELKOMSEL' ? 'selected' : '' }}>TELKOMSEL</option>
          <option value="INDOSAT" {{ old('provider') == 'INDOSAT' ? 'selected' : '' }}>INDOSAT</option>
          <option value="XL AXIATA" {{ old('provider') == 'XL AXIATA' ? 'selected' : '' }}>XL AXIATA</option>
          <option value="SMARTFREN" {{ old('provider') == 'SMARTFREN' ? 'selected' : '' }}>SMARTFREN</option>
        </select>
        @error('provider')
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div>
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Status:</label>
        <select id="status" name="status" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
          <option value="" disabled selected>Choose Status</option>
          <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
          <option value="NOT ACTIVE" {{ old('status') == 'NOT ACTIVE' ? 'selected' : '' }}>NOT ACTIVE</option>
        </select>
        @error('status')
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="flex justify-center w-full pb-4 space-x-4 md:px-4">
        <button type="submit"
          class="w-full bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 text-black font-semibold rounded-lg text-lg px-6 py-3 transition-colors duration-300 ease-in-out">
          Add Driver
        </button>
      </div>
    </div>
  </form>
</x-layouts.app>
