<x-layouts.app title="Create Project">
  <div class="flex gap-x-4 items-center">
    <a href="{{ route('projects.index') }}" class="btn btn-sm btn-ghost">
      <i class="fa-solid fa-chevron-left"></i>
      Back
    </a>
    <h1 class="text text-xl font-semibold">Project - Create</h1>
  </div>
  @if ($errors->any())
  <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg mb-4">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
  <form action="{{ route('projects.store') }}" method="POST">
    @csrf
  <div class="space-y-4">
    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name of Project
        :</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Input Name of Project" required="">
    </div>

  <div class="space-y-4">
    <label for="timezone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">TimeZone
    </label>
    <select id="timezone" name="timezone" required=""
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <option selected disabled>Choose Timezone</option>
      <option value="WIB">WIB</option>
      <option value="WIT">WIT</option>
      <option value="WITA">WITA</option>
    </select>
    @error('timezone')
    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
  @enderror
  </div>
  <div class="flex justify-center w-full pb-4 space-x-4 md:px-4">
    <button type="submit"
      class="w-full bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 text-black font-semibold rounded-lg text-lg px-6 py-3 transition-colors duration-300 ease-in-out">
      Add Project
    </button>
</div>
</div>
  </form>

</x-layouts.app>
