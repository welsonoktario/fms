<x-layouts.app title="Units">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Units</h1>
    <a href="{{ route('units.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
        <thead>
          <tr>
            {{-- <th>Id Unit</th> --}}
            <th>Code Assets</th>
            <th>Name of Unit</th>
            <th>Project</th>
            <th>Barcode Image</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($units as $u )
          <tr class="hover">
              {{-- <th class="text-left">{{$u->id}}</th> --}}
              <th>{{$u->asset_code}}</th>
              <th>{{$u->name}}</th>
              <th>{{$u->project->name}}</th>
              <th>{{$u->image_barcode}}</th>

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
