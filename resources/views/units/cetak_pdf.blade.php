<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barcode PDF - {{ $units->asset_code }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .barcode {
      margin: 30px;
      text-align: center;
    }

    img {
      width: 200px;
      height: auto;
    }
    h1 {
  margin-top: 10px; /* Memberikan sedikit jarak antara gambar dan teks */
}
  </style>
</head>

<body>

  <div class="barcode">
    @if ($units->image_barcode)
      <img src="data:image/svg;base64,{{ base64_encode(file_get_contents(public_path($units->image_barcode))) }}"
        alt="QR Code" width="200" height="200">
    @else
      <p>No Barcode Image Available</p>
    @endif
    {{-- <img src="{{ asset('storage/img/qrunits/testing.jpg') }}" alt="Testing"> --}}
    <img class="image" src="{{ public_path() . '/img/qrunits/testing.jpg' }}">
    <h1> {{ $units->asset_code }}</h1>
  </div>
</body>

</html>
