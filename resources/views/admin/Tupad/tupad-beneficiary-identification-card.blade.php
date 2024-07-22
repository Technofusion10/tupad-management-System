<!DOCTYPE html>
<html>
<head>
    <title>TUPAD ID</title>
    <style>

        .page-break
        {
            page-break-after: always;
        }

        .block
        {
            position: absolute;
            top: 375px;
            right: 215px;
            background-color: #dfebf7;
            width: 210px;
            height: 30px;
        }

        .text-full-name
        {
            position: absolute;
            top: 375px;
            right: 215px;
            background-color: #dfebf7;
            font-weight: 300;
            width: 200px;
            text-align: center;
        }

        .text-birthdate
        {
            position: absolute;
            top: 558px;
            right: 330px;
            background-color: #dfebf7;
            font-size: 12px;
            font-weight: 300;
        }

        .text-birthdate
        {
            position: absolute;
            top: 562px;
            right: 337px;
            background-color: #dfebf7;
            font-size: 9px;
            font-weight: 300;
        }

        .text-address
        {
            position: absolute;
            top: 580px;
            right: 205px;
            background-color: #dfebf7;
            font-size: 8px;
            font-weight: 300;
            width: 185px;
        }

        .text-director
        {
            position: absolute;
            top: 843px;
            right: 220px;
            background-color: #dfebf7;
            font-size: 9px;
            font-weight: 300;
            width: 200px;
            text-align: center;

        }

        .text-picture
        {
            position: absolute;
            top: 843px;
            right: 220px;
            background-color: #000000;
            font-size: 9px;
            font-weight: 300;
            width: 200px;
            text-align: center;

        }

        .qr-code
        {
            position: absolute;
            top: 115px;
            right: 190px;
            background-color: #dfebf7;
            width: 70px;
            height: 70px;
            text-align: center;
        }

    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

    <center>
        <img style="margin-left: -220px;" src="{{ public_path('images/TUPAD_ID.jpg') }}" alt="TupadLogo" width="100%" height="100%">
    </center>

    <div class="block">

    </div>
    {{-- <div class="text-picture">
        <img style="margin-left: -220px;" src="{{$file_path}}" alt="IDpicture" width="100%" height="100%">
    </div> --}}
    <p class="text-full-name">
        {{ $first_name }} {{ $middle_initial }} {{ $last_name }} {{ $name_extension }}
    </p>

    <p class="text-birthdate">
        {{ \Carbon\Carbon::parse($birthdate)->format('M-d-Y') }}
    </p>

    <p class="text-address">
        {{ $barangay }}, {{ $street }}, {{ $province }}, {{ $postal_code }}
    </p>

    <!--QrCode::size(250)->eye('circle')->generate($id) -->

    <p class="text-director">

        Atty. Erwin N. Aquino <br>
        REGIONAL DIRECTOR, DOLE-X

    </p>

    <img class="qr-code" src="data:image/png;base64, {!! $qrcode !!}">

    <center>
        <img src="data:image/png;base64, {!! $qrcode !!}" height="300px" width="300px">
    </center>

</body>
</html>
