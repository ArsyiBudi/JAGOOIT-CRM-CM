@extends('admin.layouts.main')

@section('container')
    <div class="pt-20 lg:pt-0">
    </div>
    <div class="overflow-auto pt-0 h-[90vh] w-full rounded-md">
        <h1 class=" text-4xl">PO & PKS</h1>
        <p class=" text-[16px] font-medium pt-3">Silakan input data kontrak</p>

        <div class=" mt-5  w-full ">
            <ul class="mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
                <li  class="step step-primary">
                </li>
                <li  class="step step-primary">
                </li>
                <li class="step step-primary">
                </li>
                <li class="step step-primary">
                </li>
                <li class="step step-primary">
                </li>
                <li class="step"></li>
                <li></li>
            </ul>
        </div>

        <div class="mt-5">
            <form action="">
                <div class=" block md:flex justify-end">
                    <div class="flex gap-3 items-center w-full md:w-auto">
                        <label for="endDate">End Date: </label>
                        <input type="date" id="endDate" class=" custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                    </div>
                </div>
            </form>
        </div>


        <div class="overflow-auto bg-darkSecondary mt-5 justify-between flex flex-col text-lightGrey px-8 py-10 rounded-md space-y-3">
        <form action="{{ route('save_popks') }}" method="post">
            @csrf
            <div>JagoIT:</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    Nama
                    <input class="rounded-md" type="text" name="" id="">
                </div>
                <div class="flex-auto flex flex-col ">
                    Jabatan
                    <input class="rounded-md" type="text" name="" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Alamat
                    <input class="rounded-md" type="text" name="" id="">
                </div>
            </div>
    
            <div>Client:</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    Nama
                    <input class="rounded-md" type="text" name="" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Jabatan
                    <input class="rounded-md" type="text" name="" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Alamat
                    <input class="rounded-md" type="text" name="" id="">
                </div>
            </div>
    
            <div>Jangka Waktu Kontrak:</div>
            <div class="flex flex-row space-x-2">
                <div>Dari</div>
                <input class="rounded-md" type="text" name="" id="">
                <div>Sampai</div>
                <input class="rounded-md" type="text" name="" id="">
            </div>
    
            <div>Biaya Kontrak</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    Termasuk Biaya
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Nominal
                    <input type="text" class="rounded-md">
                </div>
            </div>

            <div>Biaya Overtime (Perjam)</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    <div>Weekday</div>
                    <input type="text" class="rounded-md">
                    <div>Weekend</div>
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Catatan
                    <input type="text" class="rounded-md h-full">
                </div>
            </div>

            <div>Biaya Dinas</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    <div>Konsumsi (perhari)</div>
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Transport Pulang-Pergi Standar JKT-BDG
                    <input type="text" class="rounded-md h-full">
                </div>
            </div>

            <div>Invoice Tagihan</div>
            <div class="flex flex-row space-x-2">
                Tanggal 
                <input type="date" class="w-10">
                Setiap Bulan dan Pembayaran Selambat-Lambatnya
                <input type="number">
                Hari
            </div>

            <div>Rekening JagooIT</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    Atas Nama
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Nama Bank
                    <input type="text" class="rounded-md">
                </div>
            </div>
            <div class="flex-auto flex flex-col">
                No. Rekening
                <input type="text" class="rounded-md">
            </div>


            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    Direktur JagooIT
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Direktur Klien
                    <input type="text" class="rounded-md">
                </div>
            </div>

            <div class="mt-4 space-x-2 flex justify-end">
                <button class="bg-secondary text-white text-sm text-center w-[188px] h-[37px] rounded-md">PDF</button>
                <button type="submit" class="bg-secondary text-white text-sm text-center w-[188px] h-[37px] rounded-md">Create</button>
            </div>
        </div>
    </form>

        <div class="overflow-auto bg-darkSecondary mt-5 justify-between flex flex-col text-lightGrey px-8 py-10 rounded-md space-y-3">
            <div>File PKS (1 file, pdf)</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    <div class="flex justify-center items-center bg-white py-2 rounded-lg h-14">
                        <input id="file-cv" type="file" class="text-black rounded-lg hidden bg-white" name="">
                        <label for="file-cv" class="cursor-pointer">
                            <i class="ri-upload-2-fill text-3xl text-black"></i>
                        </label>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" class="rounded-md"> File PO Diterima
                </div>    
            </div>

            <div class="flex-auto flex flex-col">
                Deskripsi
                <input type="text" class="rounded-md h-14">
            </div>

            <div class="mt-4 space-x-2 flex justify-end">
                <button class="bg-secondary text-white text-sm text-center w-[188px] h-[37px] rounded-md">Send</button>
            </div>
        </div>
    </div>
@endsection
