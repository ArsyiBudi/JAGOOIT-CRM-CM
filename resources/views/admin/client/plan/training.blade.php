    @extends('admin.layouts.main')

    @section('container')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Plan | Training</title>
        <style>
            /* Hapus garis pada kepala tabel
            body {
                overflow-y: auto;
                overflow-x: auto; /* Membuat halaman dapat di-scroll vertikal jika kontennya melebihi tinggi layar 
} */
            .table thead tr th {
                border: none;
                text-align: center;
            }
            
            /* Warna latar belakang pada kepala tabel */
            .table thead {
                background-color: #f2f2f2; /* Sesuaikan dengan warna yang diinginkan */
            }
            
            /* Warna latar belakang pada kolom index ganjil */
            .table tr:nth-child(odd) {
                background-color: #555555; /* Sesuaikan dengan warna yang diinginkan */
                color: white;
            }
            
            /* Warna latar belakang pada baris index genap */
            .table tr:nth-child(even) {
                background-color: #202020; /* Sesuaikan dengan warna yang diinginkan */
            }
            
            /* Beri jarak samping pada tabel */
            .table-container {
                padding: 5px;
                padding-left: 3px;
                padding-right: 3px;
                border-radius: 10px;
                background-color: #555555;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                min-height: 400px; /* Atur minimum tinggi kontainer */
                overflow-y: hidden; /* Aktifkan scrolling jika kontennya melebihi tinggi kontainer */
            }
            
            .table {
                width: 90%;
                max-width: 800px; /* Sesuaikan ukuran maksimal tabel */
                margin: 20px auto; /* Membuat tabel berada di tengah */
                border-collapse: collapse; /* Menggabungkan garis antara sel-sel */
                border-radius: 8px; /* Membuat border melengkung pada tabel */
                overflow: auto; /* Mengatasi sudut border yang tumpul */
            }
    
            .table td, .table th {
                padding: px;
                text-align: center;
            }

            #enddate {
                text-align: right;
                margin-right: 2px;
            }
        
            #enddate textarea {
                width: 90px;
                height: 25px;
                background-color: black;
            }
            
            ul.steps {
                display: flex;
                justify-content: center;
            }
            .button-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                    margin-top: 20px;
            }

            .center-buttons {
                display: flex;
                flex-grow: 1; /* Mengisi ruang yang tersedia */
                justify-content: center; /* Membuat tombol prev dan next berada di tengah */
                gap: 10px;
            }
            @media (max-width: 768px) {
            /* Ubah gaya elemen-elemen di sini untuk tampilan mobile */
            /* Contoh: */
            .table {
                max-width: 100%; /* Mengisi lebar layar pada perangkat mobile */
            }

            /* ... (lanjutkan dengan perubahan lainnya) ... */
        }

        /* Aturan media query untuk lebar layar kurang dari atau sama dengan 992px */
        @media (max-width: 992px) {
            /* Ubah gaya elemen-elemen di sini untuk tampilan tablet */
            /* Contoh: */
            .table {
                max-width: 80%; /* Ukuran tabel lebih besar pada tablet */
            }
        }
        </style>
    </head>
    <body class='overflow-y-auto overflow-x-auto'>
    <div class="px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-quicksand font-semibold text-white mb-3">Training</h1>
        <h4 class="text-white">Silakan pilih kandidat</h4>
    </div>
    <ul class="mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
        <li class="step step-primary"></li>
        <li class="step step-primary"></li>
        <li class="step"></li>
        <li class="step"></li>
        <li class="step"></li>
        <li class="step"></li>
    </ul>
    <div id="enddate">
        <h1>End Date:</h1>
        <textarea name="enddata" id="enddate"></textarea>
    </div>
    <div class="table-container overflow-y-auto overflow-x-auto">
        <table class="table mt-10 overflow-y-auto">
        <!-- head -->
        <thead class='border-none'>
            <tr class=''>
            <th class='text-white font-quicksand'>No</th>
            <th class='text-white font-quicksand'>Nama Talent</th>
            <th class='text-white font-quicksand'>Pre-Test</th>
            <th class='text-white font-quicksand'>Post-Test</th>
            <th class='text-white font-quicksand'>Kelompok </th>
            <th class='text-white font-quicksand'>Akhir</th>
            <th class='text-white font-quicksand'>Rata-rata</th>
            <th class='text-white font-quicksand'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            <tr>
            <th>1</th>
            <td>Bambang S.</td>
            <td><input id='pre-test' name='pre-test' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='post-test' name='post-test' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='nilai-kelompok' name='nilai-kelompok' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='nilai-akhir' name='nilai-akhir' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='rata-rata' name='rata-rata' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input type="submit" class="bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]"></td>
            </tr>
            <!-- row 2 -->
            <tr>
            <th>2</th>
            <td>Bambang S.</td>
            <td><input id='pre-test2' name='pre-test' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='post-test2' name='post-test' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='nilai-kelompok2' name='nilai-kelompok' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='nilai-akhir2' name='nilai-akhir' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='rata-rata2' name='rata-rata' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input type="submit" class="bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]"></td>

            </tr>
            <!-- row 3 -->
            <tr>
            <th>3</th>
            <td>Bambang S.</td>
            <td><input id='pre-test3' name='pre-test' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='post-test3' name='post-test' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='nilai-kelompok3' name='nilai-kelompok' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='nilai-akhir3' name='nilai-akhir' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input id='rata-rata3' name='rata-rata' type="number" class='text-black font-quicksand' placeholder='nilai' ></td>
            <td><input type="submit" class="bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]"></td>
            </tr>
            
        </tbody>
        </table>
    </div>
    <div class="button-container">
    <button class='bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]'>back</button>
    <div class="center-buttons display-flex justify-center flex-grow-1 gap: 10px;">
        <button type="submit" class='bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]'>prev</button>
        <button type="submit" class='bg-darkSecondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]'>1</button>
        <button type="submit" class='bg-darkSecondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]'>10</button>
        <button type="submit" class='bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]'>next</button>
    </div>
    <div class="right-buttons">
        <button type="submit" class='bg-secondary text-white font-quicksand rounded-md px-4 py-2 h-[37px]'>continue</button>
    </div>
</div>
    </body>
    </html>
 @endsection
