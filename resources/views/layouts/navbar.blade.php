<div class="navbar bg-base-100">
  <div class="flex-none">
    <div class="flex-none md:hidden">
      <label for="drawer" aria-label="open sidebar" class="btn btn-square btn-ghost btn-sidebar-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          class="inline-block w-6 h-6 stroke-current">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </label>
    </div>
  </div>
  <div class="flex-1">
    {{-- <a href="/" class="btn btn-ghost text-xl">Fleet Management System</a> --}}
    <x-breadcrumbs />
  </div>
  <div class="dropdown dropdown-end flex-none">
    <button class="btn btn-square btn-ghost" tabindex="0">
      <i class="fa-solid fa-ellipsis fa-lg"></i>
    </button>
    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
      <li>
        <form class="hidden" id="logoutForm" action="{{ route('logout') }}" method="post">
          @csrf
        </form>
        <button type="submit" form="logoutForm">
          <i class="fa-solid fa-sign-out-alt mr-2"></i>
          Logout
        </button>
      </li>
    </ul>
  </div>
</div>
