<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ config('app.name', 'SIPESAT') }} - Sistem Pelayanan Surat Terpadu {{ config('app.village_name', 'Desa') }}.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>{{ $title ?? config('app.name') }} | {{ config('app.village_name', 'Desa') }}</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
  </head>

<body class="bg-gray-50 text-gray-900 antialiased">
