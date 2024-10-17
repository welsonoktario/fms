<x-layouts.app title="Create Unit">
    <div class="flex gap-x-4 items-center">
        <a href="{{ route('units.index') }}" class="btn btn-sm btn-ghost">
            <i class="fa-solid fa-chevron-left"></i>
            Back
        </a>
        <h1 class="text text-xl font-semibold">Units - Create</h1>
    </div>
     <!-- Display error messages if any -->
     @if ($errors->any())
     <div class="bg-red-500 text-white p-4 mb-4 rounded">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif
    <form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="asset_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Code Asset
                    of Units
                    :</label>
                <input type="text" name="asset_code" id="asset_code"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Asset Code of Unit" required="">
            </div>
        </div>
        {{-- <div class="space-y-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name of Units
                    :</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Name of Unit" required="">
            </div>
        </div> --}}
        <div>
            <label for="project_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Project</label>
            <select id="project_id" name="project_id"
                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="" selected disabled>Choose Project: </option>
                @foreach ($projects as $p)
                    <option value="{{ $p->id }}"> {{ $p->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Email
                Unit</label>
            <select id="user_id" name="user_id"
                class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="" selected disabled>Choose user: </option>
                @foreach ($users as $u)
                    <option value="{{ $u->id }}"> {{ $u->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="space-y-4">
            <div>
                <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Year
                    :</label>
                <input type="text" name="year" id="year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Year of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="plate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Plate
                    :</label>
                <input type="text" name="plate" id="plate"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Plate of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Name
                    :</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Name of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="meter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">KM/HM
                    :</label>
                <input type="text" name="meter" id="meter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input KM/HM of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="colour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Colour
                    :</label>
                <input type="text" name="colour" id="colour"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Colour of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Type
                    :</label>
                <input type="text" name="type" id="type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Type of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="chassis_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Chassis Number
                    :</label>
                <input type="text" name="chassis_number" id="chassis_number"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input chassis_number Number of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
          <div>
              <label for="engine_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Engine Number
                  :</label>
              <input type="text" name="engine_number" id="engine_number"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                  placeholder="Input engine_number Number of Unit" required="">
          </div>
      </div>
      <div class="space-y-4">
        <div>
            <label for="engine_model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Engine Model
                :</label>
            <input type="text" name="engine_model" id="engine_model"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Input engine_model Number of Unit" required="">
        </div>
    </div>
    <div class="space-y-4">
      <div>
          <label for="engine_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Engine Type
              :</label>
          <input type="text" name="engine_type" id="engine_type"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Input engine_type Number of Unit" required="">
      </div>
  </div>

        <div class="space-y-4">
            <div>
                <label for="tire_size_front" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tire
                    Size Front
                    :</label>
                <input type="text" name="tire_size_front" id="tire_size_front"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Tire Size Front of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="tire_size_rear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tire
                    Size Rear
                    :</label>
                <input type="text" name="tire_size_rear" id="tire_size_rear"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Tire Size Rear of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="tire_pressure_front"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tire Pressure Front
                    :</label>
                <input type="text" name="tire_pressure_front" id="tire_pressure_front"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Tire Pressure Front of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="tire_pressure_rear"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tire Pressure Rear
                    :</label>
                <input type="text" name="tire_pressure_rear" id="tire_pressure_rear"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Tire Pressure Rear of Unit" required="">
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="unit_tax_duedate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tax
                    Due Date
                    :</label>
                <input type="date" name="unit_tax_duedate" id="unit_tax_duedate"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Tax Due Date of Unit" required="">
            </div>
        </div>
        {{-- <div class="space-y-4">
            <div>
                <label for="image_unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Unit
                    Image
                    :</label>
                <input type="file" name="image_unit" id="image_unit"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Unit Image of Unit" required="">
            </div>
        </div> --}}
        <div class="space-y-4">
          <label for="image_unit">Upload Image Unit</label>
          <input type="file" name="image_unit" id="image_unit" class="form-control" accept="image/*" required>
          @error('image_unit')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
        <div class="space-y-4">
            <div>
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Description
                    :</label>
                <input type="text" name="description" id="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Input Description of Unit" required="">
            </div>
        </div>
        <div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Status:</label>
            <select id="status" name="status" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="" disabled selected>Choose Status</option>
                <option value="READY" {{ old('status') == 'READY' ? 'selected' : '' }}>READY</option>
                <option value="NOT READY" {{ old('status') == 'NOT READY' ? 'selected' : '' }}>NOT READY</option>
            </select>
            @error('status')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex justify-center w-full pb-4 space-x-4 md:px-4">
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 text-black font-semibold rounded-lg text-lg px-6 py-3 transition-colors duration-300 ease-in-out">
                Add Units
            </button>
        </div>
    </form>
    {{-- <x-slot:scripts>
      <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
      </script>
    </x-slot:scripts> --}}
</x-layouts.app>
