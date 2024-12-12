<aside class="drawer-side">
  <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
  <ul class="menu bg-base-100 w-56 h-full rounded-r-box">
    <li class="menu-title">Menu</li>
    @foreach ($routes as $route)
      <li><a href="{{ route($route->getName()) }}">{{ $route->defaults['label'] }}</a></li>
    @endforeach
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
