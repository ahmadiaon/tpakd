<!DOCTYPE html>
<html>

<head>
    <title>TPAKD</title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <a href="{{env('APP_URL') }}pengajuan-saya/{{ $mailData['id_pengajuan'] }}">{{env('APP_URL')}}pengajuan-saya/{{ $mailData['id_pengajuan']  }}</a>
    <p>Thank you</p>
</body>

</html>