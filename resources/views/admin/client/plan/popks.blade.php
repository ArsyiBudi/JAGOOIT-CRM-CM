@extends('admin.layouts.main')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    .hide-scrollbar::-webkit-scrollbar {
        width: 0.4em; /* Width of the scrollbar */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb {
        background-color: #555555; /* Color of the scrollbar thumb */
        border-radius: 8px; /* Rounded corners for the scrollbar thumb */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #777777; /* Color of the scrollbar thumb on hover */
    }

    .hide-scrollbar::-webkit-scrollbar-track {
        background-color: #555555; /* Color of the scrollbar track */
    }

    .hide-scrollbar::-webkit-scrollbar-track:hover {
        background-color: #666666; /* Color of the scrollbar track on hover */
    }

    /* Customize the appearance of the scrollbar wheel */
    .hide-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #555555 #333333;
    }

    /* Customize the appearance of the scrollbar thumb icon */
    .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
        background-color: #fff; /* Color of the scrollbar thumb icon */
    }

    .custom-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1); /* This inverts the icon color */
    }
</style>

@section('container')
    <div class="pt-20 pb-2 lg:pt-0">
    </div>
    <div class="overflow-y-auto overflow-x-hidden pt-0 h-[90vh] pb-10 w-full rounded-md overflow-x-hidden">
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


        <form action="{{ route('save_popks') }}" method="post">
            @csrf
            <div class="pl-4 mt-5 block md:flex justify-end">
                <div class="block md:flex gap-3 items-center w-full md:w-auto mt-3 md:mt-0">
                    <label for="endDate">End Date: </label> <br class=" block md:hidden">
                    <input type="date" id="endDate" class=" w-full mt-1 md:mt-0 md:w-auto custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                </div>
            </div>

            <div class="bg-darkSecondary mt-5 justify-between flex flex-col text-white px-8 py-10 rounded-md gap-y-3">

                <div class="text-xl">JagoIT:</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        Nama
                        <input class="rounded-md text-black" type="text" name="" id="">
                    </div>
                    <div class="flex-auto flex flex-col ">
                        Jabatan
                        <input class="rounded-md text-black" type="text" name="" id="">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Alamat
                        <input class="rounded-md text-black" type="text" name="" id="">
                    </div>
                </div>
        
                <div class="text-xl mt-7">Client:</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        Nama
                        <input class="rounded-md text-black" type="text" name="" id="">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Jabatan
                        <input class="rounded-md text-black" type="text" name="" id="">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Alamat
                        <input class="rounded-md text-black" type="text" name="" id="">
                    </div>
                </div>
        
                <div class="text-xl mt-7">Jangka Waktu Kontrak:</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div>Dari</div>
                    <input class="rounded-md flex-auto text-black" type="text" name="" id="">
                    <div>Sampai</div>
                    <input class="rounded-md flex-auto text-black" type="text" name="" id="">
                </div>
        
                <div class="text-xl mt-7">Biaya Kontrak</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        Termasuk Biaya
                        <input type="text" class="rounded-md text-black">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Nominal
                        <input type="text" class="rounded-md text-black">
                    </div>
                </div>

                <div class="text-xl mt-7">Biaya Overtime (Perjam)</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        <div>Weekday</div>
                        <input type="text" class="rounded-md text-black">
                        <div>Weekend</div>
                        <input type="text" class="rounded-md text-black">
                    </div>
                    <div class="flex-auto flex flex-col">
                        <label for="catatan-popks">Catatan</label>
                        <textarea id="catatan-popks" type="text" class=" text-black rounded-md h-full hide-scrollbar resize-none"></textarea>
                    </div>
                </div>

                <div class="text-xl mt-7">Biaya Dinas</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        <div>Konsumsi (perhari)</div>
                        <input type="text" class="rounded-md text-black">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Transport Pulang-Pergi Standar JKT-BDG
                        <input type="text" class="rounded-md h-full text-black">
                    </div>
                </div>

                <div class="text-xl mt-7">Invoice Tagihan</div>
                <div class="flex flex-row flex-wrap gap-2">
                    Tanggal 
                    <input type="date" class="w-10 text-black rounded-md">
                    Setiap Bulan dan Pembayaran Selambat-Lambatnya
                    <input type="number" class="text-black rounded-md">
                    Hari
                </div>

                <div class="text-xl mt-7">Rekening JagooIT</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        Atas Nama
                        <input type="text" class="rounded-md text-black">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Nama Bank
                        <input type="text" class="rounded-md text-black">
                    </div>
                </div>
                <div class="flex-auto flex flex-col">
                    No. Rekening
                    <input type="text" class="rounded-md text-black">
                </div>

                <div class="text-xl mt-7">Mengetahui</div>
                <div class="flex flex-row flex-wrap gap-2">
                    <div class="flex-auto flex flex-col">
                        Direktur JagooIT
                        <input type="text" class="rounded-md text-black">
                    </div>
                    <div class="flex-auto flex flex-col">
                        Direktur Klien
                        <input type="text" class="rounded-md text-black">
                    </div>
                </div>
                
                <div class="mt-4 flex justify-end">
                    <button type="submit" name="createWord" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
                </div>

            </div>

            <div class="overflow-auto bg-darkSecondary mt-5 justify-between flex flex-col text-lightGrey px-8 py-10 rounded-md space-y-3">
                <div>File PKS (1 file, pdf)</div>
                <div class="flex flex-row gap-2 flex-wrap">
                    <div class="flex flex-col w-full sm:w-[335px]">
                        <div class="flex justify-center items-center bg-white py-2 rounded-lg h-[56px] w-full">
                            <input id="file-cv" type="file" class="text-black rounded-lg hidden bg-white" name="">
                            <label for="file-cv" class="cursor-pointer">
                                <i class="ri-upload-2-fill text-3xl text-black"></i>
                            </label>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <input type="checkbox" class="rounded-md"> File PO Diterima
                    </div>    
                </div>

                <div class="flex-auto flex flex-col">
                    <label for="desk-popks">Deskripsi</label>
                    <textarea id="desk-popks" type="text" class="rounded-md h-[70px] text-black hide-scrollbar resize-none"></textarea>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" name="Send" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Send</button>
                </div>
            </div>

            <div class="flex justify-between items-center pt-4 md:mb-0">
                <div>
                    <a href="/client/order/plan/percobaan">
                        <div class="bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                            <p class=" hidden md:inline">Back</p>        
                            <i class="ri-arrow-left-line inline md:hidden"></i>  
                        </div>
                    </a>
                </div>
                
                <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
                    <div></div>
                    <div>
                        <button type="submit" name="save" class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">
                        <p class="hidden md:block">Save</p>
                        <i class="ri-save-line block md:hidden"></i>
                        </button>
                    </div>
        
                    <div>
                        <a href="/client/order"></a>
                        <div class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                            <p class="hidden md:inline">Finish</p> 
                            <i class="ri-check-line block md:hidden"></i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
