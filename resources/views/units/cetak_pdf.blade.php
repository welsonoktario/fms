<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode PDF - {{ isset($units[0]) ? $units[0]->asset_code : '' }}</title> <!-- Menampilkan asset_code pertama dalam collection -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .barcode {
            margin: 20px;
            text-align: center;
        }
        img {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Barcode for Asset Code: {{ isset($units[0]) ? $units[0]->asset_code : '' }}</h1> <!-- Menampilkan asset_code pertama -->
    <div class="barcode">
        @foreach ($units as $u)
            @if($u->image_barcode)
                <img src="{{ Storage::url($u->image_barcode) }}" alt="QR Code" width="100" height="100">
            @else
                <p>No Barcode Image Available for {{ $u->asset_code }}</p>
            @endif
        @endforeach
    </div>
</body>
</html>
