<x-layouts.app>
  <div class="overflow-x-auto">
    <table class="table fixed">
      <thead>
        <tr>
          <th>Id Mechanic</th>
          <th>Name Of Mechanic</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mechanics as $m )
        <tr class="bg-base-200">
            <th>{{$p->id}}</th>
            <th>{{$p->name}}</th>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layouts.app>
