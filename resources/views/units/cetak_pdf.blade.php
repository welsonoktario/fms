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
    <h1>Barcode for Asset Code: {{ $units->asset_code }}</h1>
    <div class="barcode">

        @if($units->image_barcode)
        {{-- <img height="10" width="100" src="{{ Storage::url($units->image_barcode) }}"> --}}
        <img src="{{ Storage::url($units->image_barcode) }}" alt="QR Code" width="100" height="100">
        @else
            <p>No Barcode Image Available</p>
        @endif
    </div>
</body>
</html>
