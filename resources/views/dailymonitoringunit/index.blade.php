<x-layouts.app title="Daily">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Daily Monitoring Unit</h1>
    <a href="{{ route('dailymonitoringunits.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
        <thead>
          <tr>
            <th>Id</th>
            <th>Driver ID</th>
            <th>User ID</th>
            <th>Unit ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dailymonitoringunits as $dmu)
          <tr class="hover">
              <th class="text-left">{{$dmu->id}}</th>
              <th class="text-left">{{$dmu->driver_id->name}}</th>
              <th class="text-left">{{$dmu->user_id->name}}</th>
              <th class="text-left">{{$dmu->unit_id->asset_code}}</th>
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
