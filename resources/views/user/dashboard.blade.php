<x-layouts.app>
  <h1 class="text-xl font-bold">Halo, {{ $user->name }}</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 mt-6 gap-4 md:gap-6">
    {{-- Detail unit --}}
    <div class="card bg-base-100">
      <div class="card-body">
        <h2 class="card-title">Detail Unit</h2>

        <ul class="max-h-64 overflow-y-auto">
          <li>
            <p class="font-semibold">Kode Unit</p>
            <p>{{ $unit->asset_code }}</p>
          </li>
          <li>
            <p class="font-semibold">Kode Unit</p>
            <p>{{ $unit->asset_code }}</p>
          </li>
        </ul>
      </div>
    </div>

    {{-- Checklist hari ini --}}
    <div class="card bg-base-100">
      <div class="card-body">
        <h2 class="card-title">Checklist Hari Ini</h2>

        @if ($todayChecklist)
          <ul class="max-h-64 overflow-y-auto">
            <li>
              <p class="font-semibold">Kondisi</p>
              <p>{{ $todayChecklist->status_unit }}</p>
            </li>
            <li>
              <p class="font-semibold">Kode Unit</p>
              <p>{{ $unit->asset_code }}</p>
            </li>
          </ul>
        @else
          <div class="flex items-center justify-center h-64">
            <p class="text-center">Belum ada checklist hari ini</p>
          </div>
        @endif
      </div>
    </div>

    {{-- History checklist --}}
    <div class="col-span-full card bg-base-100">
      <div class="card-body">
        <h2 class="card-title">History Checklist</h2>

        <div class="overflow x-auto">
          <form action="" class="flex pt-4 pb-2 gap-x-4">
            <select name="filter_by" class="select select-bordered">
              <option value="proyek" @selected(request()->input('filter_by') === 'proyek')>Proyek</option>
              <option value="driver" @selected(request()->input('filter_by') === 'driver')>Driver</option>
            </select>

            <input name="query" class="input input-bordered" type="search" placeholder="Kata kunci"
              value="{{ request()->input('query') }}">

            <button class="btn btn-primary" type="submit">Cari</button>
          </form>

          <table class="table table-auto w-full">
            <thead>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Driver</th>
              <th>Proyek</th>
              <th>Status Unit</th>
              <th>Isu</th>
            </thead>

            <tbody>
              @forelse ($history as $c)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ \Carbon\Carbon::parse($c->created_at)->format('j M Y H:m:s') }}</td>
                  <td>{{ $c->user->name }}</td>
                  <td>{{ $c->project->name }}</td>
                  <td @class([
                      'text-green-500' => $c->status_unit === 'READY',
                      'text-red-500' => $c->status_unit === 'NOT READY',
                      'text-orange-500' => $c->status_unit === 'NEEDS MAINTENANCE',
                  ])>
                    {{ $c->status_unit }}
                  </td>
                  <td>{{ $c->issue ?? '-' }}</td>
                </tr>
              @empty
                <tr>
                  <td class="h-20 text-center" colspan="6">Belum ada data</td>
                </tr>
              @endforelse
            </tbody>

            <tfoot>
              <tr>
                <td colspan="6" class="flex justify-end">
                  {{ $history->links() }}
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-layouts.app>
