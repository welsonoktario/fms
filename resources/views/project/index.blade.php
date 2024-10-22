<x-layouts.app title="Project">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Project</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
        <thead>
          <tr>
            <th>Id Projects</th>
            <th>Name of Projects</th>
            <th>Time Zone</th>
            <th>Location</th>
            <th>Radius</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $p )
          <tr class="hover">
              <th class="text-left">{{$p->id}}</th>
              <th>{{$p->name}}</th>
              <th>{{$p->timezone}}</th>
              <th>{{$p->location}}</th>
              <th>{{$p->radius}}</th>
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
