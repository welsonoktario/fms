<x-layouts.app title="Maintenance Types">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Maintenance Types</h1>
    <a href="{{ route('maintenance-types.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>

  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Duration</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mts as $mt)
          <tr class="hover">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mt->name }}</td>
            <td>{{ $mt->duration_value }} {{ $mt->duration_type }}</td>
            <td>
              <a href="{{ route('maintenance-types.edit', $mt->id) }}" class="btn btn-sm btn-ghost">
                Edit
              </a>
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
          // lengthMenu: [1, 10, 25, 50, 100],
          columnDefs: [{
            orderable: false,
            searchable: false,
            targets: -1,
          }]
        });
      })
    </script>
  </x-slot>
</x-layouts.app>
