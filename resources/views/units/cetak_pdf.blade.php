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
      position: relative; /* Menambahkan posisi relatif pada kontainer */
    }

    img {
      width: 200px;
      height: auto;
    }

    .asset-code {
      position: absolute; /* Menggunakan posisi absolute */
      top: 10px; /* Jarak dari atas */
      right: 10px; /* Jarak dari kanan */
      background-color: white; /* Latar belakang untuk memastikan keterbacaan */
      padding: 5px; /* Sedikit padding untuk tampilan lebih baik */
      border: 1px solid #ccc; /* Border untuk memperjelas */
      border-radius: 5px; /* Sudut membulat */
    }
  </style>
</head>

<body>

  <div class="barcode">
    @if ($units->image_barcode)
      <img src="data:image/svg;base64,{{ base64_encode(file_get_contents(public_path($units->image_barcode))) }}"
        alt="QR Code" width="200" height="200">
      <div class="asset-code">{{ $units->asset_code }}</div> <!-- Memindahkan asset_code ke sini -->
    @else
      <p>No Barcode Image Available</p>
    @endif
  </div>
</body>

</html>
