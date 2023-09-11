<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')
</head>

<body class="p-3 bg-white text-black">
    <p class="mb-2">Yth, <br><strong>Bpk. {{ $mailData['lead_data']->pic_name }}<br>({{ $mailData['lead_data']->business_name }})</strong> <br>di tempat</p>
    <p class="mb-2">Melalui email ini kami sampaikan proposal penawaran {{ $mailData['description'] }}.</p>

    <p>Besar harapan kami dapat bekerja sama dengan institusi bapak dan menjadi bagian dari solusi IT terima kasih.</p>
    <p>Salam,</p>
    <p class="underline"><strong class="underline">Septian Nugraha K, S.Kom</strong></p>
    <p>Account Manager</p><br>

    <div>
        <img src="https://lh3.googleusercontent.com/u/0/drive-viewer/AITFw-wM8rXCZg03biv6nWRsCe62EJRmo3GMinUqkr7jY0fY8TqgNof0Hgzr51Zz9nmeW40FRRvhdIThcIMBPvOHAH3tKxLO8Q=w1919-h983" alt="" width="152" height="20">
        <h4 class="text-gray-600" style="color:grey; font-weight: 600;">PT. Jago Talenta Indonesia</h4>
        <h4 class="text-gray-600" style="color:grey;">Komp. Buah Batu Regency Kav A1. No. 9</h4>
        <h4 class="text-gray-600" style="color:grey;">Kel. Kujangsari, Kec. Bandung Kidul</h4>
        <h4 class="text-gray-600" style="color:grey;">Kota Bandung, Jawa Barat</h4>
    </div>
</body>

</html>