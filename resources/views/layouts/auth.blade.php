<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Fleet Management System - Login</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite('resources/css/app.css')
  @if (isset($styles))
    {{ $styles }}
  @endif
</head>

<body class="font-sans antialiased">
  <main class="flex justify-center items-center h-screen w-screen bg-base-300">
    {{ $slot }}
  </main>

  <script src="https://unpkg.com/jquery@3.7.1/dist/jquery.min.js"></script>
  @if (isset($scripts))
    {{ $scripts }}
  @endif
</body>

</html>
