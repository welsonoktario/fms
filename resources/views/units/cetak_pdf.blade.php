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
      margin-left: auto;
      margin-right: auto;
      text-align: center;
      width: 500px;
    }

    img {
      width: 200px;
      height: auto;
    }

    table {
      width: 250px;
      margin-left: auto;
      margin-right: auto;
    }

    h1 {
      margin-bottom: 0.5rem; /* Decrease the margin */
    }

    .barcode-container {
      padding-top: 0.5rem; /* Decrease the padding */
    }
  </style>
</head>

<body>
  <table>
    <tr>
      <td style="text-align: left;">
        <img src="data:image/svg;base64,{{ base64_encode(file_get_contents(public_path('img/logoakas.jpg'))) }}"
          alt="Logo" style="width: 64px; height: 64px;">
      </td>
      <td style="text-align: right;">
        <h1>{{ $units->asset_code }}</h1>
      </td>
    </tr>
    <tr>
      <td style="text-align: center; padding-top: 0.5rem;" colspan="2" class="barcode-container">
        @if ($units->image_barcode)
          <img src="data:image/svg;base64,{{ base64_encode(file_get_contents(public_path($units->image_barcode))) }}"
            alt="Barcode" style="width: 250px; height: 250px">
        @else
          <p>No Barcode Image Available</p>
        @endif
      </td>
    </tr>
  </table>
</body>

</html>
