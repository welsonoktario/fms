<x-layouts.auth>
  <form class="card w-96 bg-base-100" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="card-body">
      <h2 class="card-title">Masuk</h2>
      <div class="space-y-3 mt-4">
        @if (session('status'))
          <div class="font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
          </div>
        @endif
        <div class="space-y-1">
          <input type="email" name="email" placeholder="Email" class="input input-bordered w-full max-w-xs" />
          @if ($errors->get('email'))
            <ul class="text-sm text-red-600 dark:text-red-400 space-y-1">
              @foreach ((array) $errors->get('email') as $message)
                <li>{{ $message }}</li>
              @endforeach
            </ul>
          @endif
        </div>
        <input type="password" name="password" placeholder="Password" class="input input-bordered w-full max-w-xs" />
      </div>
      <div class="card-actions justify-end mt-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </form>
</x-layouts.auth>
