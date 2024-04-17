<x-layouts.app>
  <div class="overflow-x-auto">
    <table id="table-mechanics"class="table fixed">
      <thead>
        <tr>
          <th>Id Mechanic</th>
          <th>Name Of Mechanic</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mechanics as $m )
        <tr class="bg-base-200">
            <th>{{$m->id}}</th>
            <th>{{$m->name}}</th>
          </tr>
        @endforeach
      </tbody>
    </table>
    <x-slot:scripts>
                            <script>
                                $(function() {
                                    new DataTable('#table-mechanics', {
                                        ordering: true
                                    });
                                    // $('#cariproyek').change(function()  {
                                    //  const idProyek = $(this).val();
                                    // window.location.search = '?proyek=' + idProyek;
                                    // });
                                    // $('#caridept').change(function() {
                                    //  const idDept = $(this).val();
                                    // window.location.search = '?dept=' + idDept;
                                    // });
                                });
                            </script>
                        </x-slot:scripts>
  </div>
</x-layouts.app>
