<x-layouts.app title="Maintenance Types">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Maintenance Types</h1>
    <a href="{{ route('maintenance-types.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>

  <x-container class="overflow-x-auto">
    <table id="table" class="table table-auto !w-full">
      <thead>
        <tr>
          <th class="w-5">No.</th>
          <th>Name</th>
          <th>Duration</th>
          <th class="!w-40"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mts as $mt)
          <tr class="hover">
            <td class="!text-center">{{ $loop->iteration }}</td>
            <td>{{ $mt->name }}</td>
            <td>{{ $mt->duration_value }} {{ $mt->duration_type }}</td>
            <td class="!text-center">
              <div class="flex items-center gap-x-3">
                <a href="{{ route('maintenance-types.edit', $mt->id) }}" class="btn btn-sm btn-ghost">
                  <i class="fa-regular fa-edit"></i>
                  Edit
                </a>
                <form action="{{ route('maintenance-types.destroy', $mt->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <buton type="submit" class="btn btn-sm btn-ghost-danger">
                    <i class="fa-regular fa-trash-can"></i>
                    Delete
                  </buton>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-container>

  <x-slot name="scripts">
    <script type="module">
      $(function() {
        $('#table').DataTable({
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
