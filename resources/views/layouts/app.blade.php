@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite('resources/css/app.css')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  @if (isset($styles))
    {{ $styles }}
  @endif
</head>

<body class="font-sans antialiased">
  <main class="drawer md:drawer-open">
    <input id="drawer" type="checkbox" class="drawer-toggle" />
    <x-layouts.sidebar />
    <div class="drawer-content flex flex-col h-screen overflow-y-auto">
      <x-layouts.navbar />
      <div class="p-4 bg-base-200 flex-1">
        @if (session()->has('success'))
          <div role="alert" class="alert alert-success !text-base-100 mb-6">
            <i class="fa-regular fa-circle-check"></i>
            <span>{{ session()->get('success') }}</span>
          </div>
        @endif
        {{ $slot }}
      </div>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.4/js/dataTables.js" type="module"></script>

  @vite('resources/js/app.js')

  @if (isset($scripts))
    {{ $scripts }}
  @endif
</body>

</html>
