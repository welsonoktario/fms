<x-layouts.app title="Units">
    <div class="flex justify-between w-full items-center">
        <h1 class="text text-xl font-semibold">Units</h1>
        <a href="{{ route('units.create') }}" class="btn btn-sm btn-primary">Add</a>
    </div>
    <form method="GET">
      <label for="cariproyek" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih proyek:</label>
      <select id="cariproyek" name="project"
          class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-700 block w p-3.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="all">All</option>
          @foreach ($projects as $p)
              <option value="{{ $p->id }}" @if (request()->get('project') == $p->id) selected @endif>{{ $p->name }}
              </option>
          @endforeach
      </select>
      <button class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" type="submit">Cari</button>
  </form>
    <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
        <table id="table" class="table table-auto w-full">
            <thead>
                <tr>

                    <th>Asset Code</th>
                    <th>Name / Model Units</th>
                    <th>Location Project</th>
                    <th>Unit Image</th>
                    <th>Barcode Image</th>
                    <th>Generate Barcode (1st Time)</th>
                    <th>Action Button</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $u)
                    <tr class="hover">

                        <td>{{ $u->asset_code }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->project->name }}</td>
                        <td><img height="10" width="100" src="{{ Storage::url($u->image_unit) }}"></td>
                        <td>
                          @if($u->image_barcode)
                          <p>{{$u->asset_code}}</p>
                          <img src="{{ $u->image_barcode }}" alt="QR Code" width="100" height="100">
                          @else
                              <p>No QR Code</p>
                          @endif
                      </td>
                        <td>
                            <a href="{{ route('generate2', $u->asset_code) }}" class="btn btn-sm btn-primary">Generate
                                Barcode</a>
                        </td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            <a href="{{ url('units/detail/' . $u->asset_code) }}"
                                data-drawer-show="drawer-update-product-default"
                                aria-controls="drawer-update-product-default" data-drawer-placement="right"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Units Detail
                            </a>
                            <a href="{{ url('units/cetak_pdf/' . $u->asset_code) }}" class="btn btn-sm btn-success">Cetak Barcode PDF</a>
                            <button type="button" id="delete-karyawan"
                                data-drawer-target="drawer-delete-product-default"
                                data-drawer-show="drawer-delete-product-default"
                                aria-controls="drawer-delete-product-default" data-drawer-placement="right"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Delete item
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-slot name="scripts">
        <script type="module">
            $(function() {
                $('#table').DataTable({
                    columnDefs: [{
                        orderable: true,
                        searchable: true,
                        targets: -1,
                    }]
                });
            })
        </script>
    </x-slot>
</x-layouts.app>
