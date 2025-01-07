<x-layouts.app title="Daily">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Daily Monitoring Unit</h1>
    {{-- <a href="{{ route('dailymonitoringunits.create') }}" class="btn btn-sm btn-primary">Add</a> --}}
  </div>
  <form method="GET">
    <label for="cariproyek" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih proyek:</label>
    <select id="cariproyek" name="project"
      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-700 block w p-3.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="all">All</option>
      @foreach ($projects as $p)
        <option value="{{ $p->id }}" @if (request()->get('project') == $p->id) selected @endif>
          {{ $p->name }}
        </option>
      @endforeach
    </select>
    <label for="cari-periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
      Periode Awal
    </label>
    <input id="cariperiode" type="date" name="dari" id="dari"
      value="{{ request()->get('dari') ?? now()->format('Y-m-d') }}"
      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-700 block w p-3.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <label for="cari-periode1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
      Periode Akhir
    </label>
    <input id="cariperiode2" type="date" name="ke" id="ke"
      value="{{ request()->get('ke') ?? now()->format('Y-m-d') }}"
      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-700 block w p-3.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-500 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <br>
    <button
      class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
      type="submit">Cari</button>
    @if (request()->input('action') == 'export')
      <a class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
        href="{{ '/dailymonitorings/cetak_excel?project= ' . request()->get('project') . '&dari=' . request()->get('dari') . '&ke=' . request()->get('ke') }}">
        CETAK EXCEL
      </a>
    @else
      <a class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
        href="{{ '/dailymonitorings/cetak_excel?project= ' . request()->get('project') . '&dari=' . request()->get('dari') . '&ke=' . request()->get('ke') }}">
        CETAK EXCEL
      </a>
    @endif
  </form>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
      <thead>
        <tr>
          <th>Id</th>
          <th>Tanggal Ceklist</th>
          <th>Unit ID</th>
          <th>Driver ID</th>
          <th>Proyek</th>
          <th>Kondisi</th>
          <th>Status Units</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($dailymonitoringunits as $dmu)
          <tr class="hover">
            <th class="text-center">{{ $dmu->id }}</th>
            <th class="text-center">{{ \Carbon\Carbon::parse($dmu->created_at)->format('d M Y') }}</th>
            <th class="text-center">{{ $dmu->unit->asset_code }}</th>
            <th class="text-center">{{ $dmu->driver->name }}</th>
            <th class="text-center">{{ $dmu->project->name }}</th>
            <th class="text-center">
              @if (is_array($dmu->conditions))
                  @foreach ($dmu->conditions as $condition)
                      <div>{{ $condition['name'] }}: {{ $condition['value'] }}</div>
                  @endforeach
              @else
                  {{ $dmu->conditions }}
              @endif
          </th>
            <th class="text-center">{{ $dmu->status_unit }}</th>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <x-slot name="scripts">
    <script type="module">
      $(function() {
        $('#table').DataTable({
          // lengthMenu: [1, 10, 25, 50, 100],
          columnDefs: [{
            orderable: true,
            searchable: true,
            targets: -2,
          }]
        });
      })
    </script>
  </x-slot>
</x-layouts.app>
