<x-layouts.app title="Create Sparepart">
  <div class="flex gap-x-4 items-center">
    <a href="{{ route('sparepart_categories.index') }}" class="btn btn-sm btn-ghost">
      <i class="fa-solid fa-chevron-left"></i>
      Back
    </a>
    <h1 class="text text-xl font-semibold">Categorie Sparepart - Create</h1>
  </div>
  <form action="{{ route('sparepart_categories.store') }}" method="POST">
    @csrf
  <div class="space-y-4">
    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Categorie Sparepart
        :</label>
      <input type="text" name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
        placeholder="Input Name of Sparepart" required="">
    </div>
  </div>
  <div class="flex justify-center w-full pb-4 space-x-4 md:px-4">
    <button type="submit"
      class="text-white w-full justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
      Add Categorie Sparepart
    </button>
  </div>
  </form>

</x-layouts.app>
