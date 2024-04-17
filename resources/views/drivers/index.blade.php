<x-layouts.app>
  <div class="overflow-x-auto">
    <table class="table fixed">
      <thead>
        <tr>
          <th>Id Drivers</th>
          <th>Name Of Drivers</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($drivers as $d )
        <tr class="bg-base-200">
            <th>{{$d->id}}</th>
            <th>{{$d->name}}</th>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layouts.app>
