@extends('admin.layouts.main')

@section('container')
    <div class="pt-20 lg:pt-0">
    </div>
    <div class="overflow-auto pt-0 h-[90vh] w-full rounded-md hide-scrollbar overflow-x-hidden">
        <h1 class="pl-4 text-4xl">PO & PKS</h1>
        <p class=" text-[16px] font-medium pl-4 pt-3">Silakan input data kontrak</p>

        <div class="mt-5  w-full ">
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

        <div class="pl-4 mt-5">
            <form action="">
                <div class=" block md:flex justify-end">
                    <div class="flex gap-3 items-center w-full md:w-auto">
                        <label for="endDate">End Date: </label>
                        <input type="date" id="endDate" class=" custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                    </div>
                </div>
            </form>
        </div>


        <div class="overflow-auto bg-darkSecondary mt-5 justify-between flex flex-col text-lightGrey px-8 py-10 rounded-md gap-y-3">
        <form action="{{ route('save_popks') }}" method="post">
            @csrf
            <div class="text-xl">JagoIT:</div>
            <div class="flex flex-row flex-wrap gap-2">
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
    
            <div class="text-xl mt-7">Client:</div>
            <div class="flex flex-row flex-wrap gap-2">
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
    
            <div class="text-xl mt-7">Jangka Waktu Kontrak:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div>Dari</div>
                <input class="rounded-md flex-auto" type="text" name="" id="">
                <div>Sampai</div>
                <input class="rounded-md flex-auto" type="text" name="" id="">
            </div>
    
            <div class="text-xl mt-7">Biaya Kontrak</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Termasuk Biaya
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Nominal
                    <input type="text" class="rounded-md">
                </div>
            </div>

            <div class="text-xl mt-7">Biaya Overtime (Perjam)</div>
            <div class="flex flex-row flex-wrap gap-2">
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

            <div class="text-xl mt-7">Biaya Dinas</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    <div>Konsumsi (perhari)</div>
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Transport Pulang-Pergi Standar JKT-BDG
                    <input type="text" class="rounded-md h-full">
                </div>
            </div>

            <div class="text-xl mt-7">Invoice Tagihan</div>
            <div class="flex flex-row flex-wrap gap-2">
                Tanggal 
                <input type="date" class="w-10">
                Setiap Bulan dan Pembayaran Selambat-Lambatnya
                <input type="number">
                Hari
            </div>

            <div class="text-xl mt-7">Rekening JagooIT</div>
            <div class="flex flex-row flex-wrap gap-2">
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

            <div class="text-xl mt-7">Mengetahui</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Direktur JagooIT
                    <input type="text" class="rounded-md">
                </div>
                <div class="flex-auto flex flex-col">
                    Direktur Klien
                    <input type="text" class="rounded-md">
                </div>
            </div>

            
            <div class="mt-4 flex justify-end">
                <button type="submit" name="createWord" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
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

            <div class="mt-4 flex justify-end">
                <button type="submit" name="Send" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Send</button>
            </div>
        </div>

        <div class=" flex justify-between items-center pt-4 mb-10 md:mb-0">
            <div>
                <button class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                    <p class=" hidden md:block">Back</p>        
                    <i class="ri-arrow-left-line block md:hidden"></i>  
                </button>
            </div>
            
            <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
                <div></div>
                <div>
                    <button type="submit" name="save" class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">Save</button>
                </div>
    
                <div>
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                      <p class=" hidden md:block">Continue</p> 
                      <i class="ri-arrow-right-line block md:hidden"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
