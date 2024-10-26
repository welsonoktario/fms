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
      position: relative; /* Kontainer untuk posisi absolute */
    }

    img {
      width: 200px;
      height: auto;
    }

    .asset-code {
      position: absolute; /* Posisi absolute */
      top: 5px; /* Jarak dari atas */
      right: 5px; /* Jarak dari kanan */
      background-color: white; /* Latar belakang untuk keterbacaan */
      padding: 5px; /* Padding untuk tampilan */
      border: 1px solid #ccc; /* Border */
      border-radius: 5px; /* Sudut membulat */
      font-size: 14px; /* Ukuran font */
      z-index: 10; /* Pastikan teks berada di atas gambar */
    }
  </style>
</head>

<body>

  <div class="barcode">
    @if ($units->image_barcode)
      <img src="data:image/svg;base64,{{ base64_encode(file_get_contents(public_path($units->image_barcode))) }}"
        alt="QR Code" width="200" height="200">
      <div class="asset-code">{{ $units->asset_code }}</div> <!-- Teks di pojok kanan atas -->
    @else
      <p>No Barcode Image Available</p>
    @endif
  </div>
</body>

</html>
