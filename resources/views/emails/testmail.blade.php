<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')
</head>

<body class="p-3 bg-white text-black">
    <p>Yth, <br><strong>Bpk. {{ $mailData['lead_data']->pic_name }}<br>({{ $mailData['lead_data']->business_name }})</strong> <br>di tempat</p><br>
    <p>Melalui email ini kami sampaikan proposal penawaran {{ $mailData['description'] }}.</p><br>


    <p>Besar harapan kami dapat bekerja sama dengan institusi bapak dan menjadi bagian dari solusi IT terima kasih.</p><br>
    <p>Salam,</p><br>
    <p class="underline"><strong class="underline">Septian Nugraha K, S.Kom</strong></p>
    <p>Account Manager</p><br>

    <footer>
        <img src="/jagoLogo.png" alt="">
        <h4 class="text-gray-600">PT. Jago Talenta Indonesia</h4>
        <h4 class="text-gray-600">Komp. Buah Batu Regency Kav A1. No. 9</h4>
        <h4 class="text-gray-600">Kel. Kujangsari, Kec. Bandung Kidul</h4>
        <h4 class="text-gray-600">Kota Bandung, Jawa Barat</h4>
    </footer>
</body>

</html>