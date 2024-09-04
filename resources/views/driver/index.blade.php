<x-layouts.app title="Driver">
  <div class="flex justify-between w-full items-center">
    <h1 class="text text-xl font-semibold">List Driver</h1>
    <a href="{{ route('drivers.create') }}" class="btn btn-sm btn-primary">Add Driver</a>
  </div>
  <div class="mt-4 rounded-lg p-4 shadow overflow-x-auto bg-base-100">
    <table id="table" class="table table-auto w-full">
        <thead>
          <tr>
            <th>Employee Identification Number (NIK)</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Provider</th>
            <th>Status</th>
            <th>Barcode Image</th>
            <th>Generate Barcode (1st Time)</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($drivers as $d )
          <tr class="hover">
              <th>{{$d->nik}}</th>
              <th>{{$d->name}}</th>
              <th>{{$d->phone_number}}</th>
              <th>{{$d->provider}}</th>
              <th>{{$d->status}}</th>
              <td><img height="100" src="{{ asset('img/qr/' . $d->nik . '.svg') }}"></td>
              <td>
                <a href="{{ route('generate',$d->nik) }}" class="btn btn-sm btn-primary">Generate Barcode</a>
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
              searchable: true,
              targets: -1,
            }]
          });
        })
      </script>
    </x-slot>
</x-layouts.app>
