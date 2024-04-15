<x-layouts.app>
  <div class="overflow-x-auto">
      <table class="table fixed">
        <thead>
          <tr>
            <th>Id Projects</th>
            <th>Name of Projects</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $p )
          <tr class="bg-base-200">
              <th>{{$p->id}}</th>
              <th>{{$p->name}}</th>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-layouts.app>
