<x-layouts.auth>
  <form class="card w-96 bg-base-100" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="card-body">
      <h2 class="card-title">Masuk</h2>
      <div class="space-y-3 mt-4">
        <input type="email" name="email" placeholder="Email" class="input input-bordered w-full max-w-xs" />
        <input type="password" name="password" placeholder="Password" class="input input-bordered w-full max-w-xs" />
      </div>
      <div class="card-actions justify-end mt-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </form>
</x-layouts.auth>
