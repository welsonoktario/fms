<aside class="drawer-side">
    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu bg-base-100 w-56 h-full rounded-r-box">
        <li class="menu-title">Menu</li>
        <li><a href="{{ route('units.index') }}">Units</a></li>
        <li><a href="{{ route('projects.index') }}">Project</a></li>
        <li><a href="{{ route('drivers.index') }}">Driver</a></li>
        <li>
            <button type="button"
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Monitoring Units</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                <li><a href="{{ route('dailymonitoringunits.index') }}">Daily Monitoring Units</a></li>
            </ul>
        </li>
    </ul>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const button = document.querySelector('[data-collapse-toggle="dropdown-example"]');
          const dropdown = document.getElementById('dropdown-example');

          if (button && dropdown) {
              button.addEventListener('click', function() {
                  dropdown.classList.toggle('hidden');
              });
          }
      });
      </script>
</aside>
