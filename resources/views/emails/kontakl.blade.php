<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari Form Kontak</title>
</head>
<body>
    <h2>Pesan Baru dari Form Kontak</h2>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <p><strong>Nama:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
