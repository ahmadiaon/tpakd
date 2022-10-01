<!DOCTYPE html>
<html>

<head>
    <title>TPAKD</title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Pengajuan anda berhasil dilakukan, cek secara berkala</p>
    <p>Nomor pengajuan anda adalah,</p>
    <h2> KUR-1</h2>
    <p>atau bisa dengan klik link berikut,</p>
    <a href="">http://127.0.0.1:8000/pengajuan-saya{{ $mailData['id_pengajuan'] }}</a>
    <p>Thank you</p>
</body>

</html>