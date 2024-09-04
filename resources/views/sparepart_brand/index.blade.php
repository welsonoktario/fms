<x-layouts.app title="sparepart">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">Brand Sparepart</h1>
    <a href="{{ route('sparepart_brands.create') }}" class="btn btn-sm btn-primary">Add</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
        <thead>
          <tr>
            <th>Id Brand</th>
            <th>Name of Brand Sparepart</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sparepart_brands as $sb )
          <tr class="hover">
              <th>{{$sb->id}}</th>
              <th>{{$sb->name}}</th>
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
              targets: -1,
            }]
          });
        })
      </script>
    </x-slot>
</x-layouts.app>
