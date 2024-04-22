<x-layouts.app title="Mechanic">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Project</h1>
    <a href="{{ route('mechanics.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
        <thead>
          <tr>
            <th>Id Mechanics</th>
            <th>Name of Mechanics</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mechanics as $m )
          <tr class="hover">
              <th>{{$m->id}}</th>
              <th>{{$m->name}}</th>
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
              searchable: true,
              targets: -1,
            }]
          });
        })
      </script>
    </x-slot>
</x-layouts.app>
