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
    <div class="overflow-y-auto  pt-0 h-[90vh] pb-10 w-full rounded-md overflow-x-hidden">
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
    <form action="{{ route('create_popks') }}" method="post">         
    @csrf
    @if (!empty($field))
        @method('PATCH')
    @endif
                <div class="pl-4 mt-5 block md:flex justify-end">
                    <div class="flex gap-3 items-center w-full md:w-auto">
                        <label for="endDate">End Date: </label>
                        <input type="date" id="endDate" class=" custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                    </div>
                </div>


        <div class="overflow-auto bg-darkSecondary mt-5 justify-between flex flex-col text-white px-8 py-10 rounded-md gap-y-3">

            <div class="text-xl">JagoIT:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Nama
                    <input class="rounded-md text-black" type="text" name="employee_name" value="{{ old('employee_name',@$field->employee_name)}}" id="">
                </div>
                <div class="flex-auto flex flex-col ">
                    Jabatan
                    <input class="rounded-md text-black" type="text" name="employee_position" value="{{ old('employee_position',@$field->employee_position)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Alamat
                    <input class="rounded-md text-black" type="text" name="employee_address"  value="{{ old('employee_address',@$field->employee_address)}}" id="">
                </div>
            </div>
    
            <div class="text-xl mt-7">Client:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Nama
                    <input class="rounded-md text-black" type="text" name="client_name" value="{{ old('client_name',@$field->client_name)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Jabatan
                    <input class="rounded-md text-black" type="text" name="client_position" value="{{ old('client_position',@$field->client_position)}}"  id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Alamat
                    <input class="rounded-md text-black" type="text" name="client_address"  value="{{ old('client_address',@$field->client_address)}}" id="">
                </div>
            </div>
    
            <div class="text-xl mt-7">Jangka Waktu Kontrak:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div>Dari</div>
                <input class="rounded-md flex-auto text-black" type="text" name="start_date" value="{{ old('start_date',@$field->start_date)}}" id="">
                <div>Sampai</div>
                <input class="rounded-md flex-auto text-black" type="text" name="end_date" value="{{ old('end_date',@$field->end_date)}}" id="">
            </div>
    
            <div class="text-xl mt-7">Biaya Kontrak</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Termasuk Biaya
                    <input type="text" class="rounded-md text-black" name="included_fees" value="{{ old('included_fees',@$field->included_fees)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Nominal
                    <input type="text" class="rounded-md text-black" name="nominal_fees" value="{{ old('nominal_fees',@$field->nominal_fees)}}" id="">
                </div>
            </div>

            <div class="text-xl mt-7">Biaya Overtime (Perjam)</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    <div>Weekday</div>
                    <input type="text" class="rounded-md text-black" name="weekday_cost" value="{{ old('weekday_cost',@$field->weekday_cost)}}">
                    <div>Weekend</div>
                    <input type="text" class="rounded-md text-black" name="weekend_cost" value="{{ old('weekend_cost',@$field->weekend_cost)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    <label for="catatan-popks">Catatan</label>
                    <textarea id="catatan-popks" type="text" class=" text-black rounded-md h-full hide-scrollbar resize-none" name="notes"  value="{{ old('notes',@$field->notes)}}"></textarea>
                </div>
            </div>

            <div class="text-xl mt-7">Biaya Dinas</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    <div>Konsumsi (perhari)</div>
                    <input type="text" class="rounded-md text-black" name="consumption_cost" value="{{ old('consumption_cost',@$field->consumption_cost)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    Transport Pulang-Pergi Standar JKT-BDG
                    <input type="text" class="rounded-md h-full text-black" name="transportation_cost" value="{{ old('transportation_cost',@$field->transportation_cost)}}">
                </div>
            </div>

            <div class="text-xl mt-7">Invoice Tagihan</div>
            <div class="flex flex-row flex-wrap gap-2">
                Tanggal 
                <input type="date" class="w-10 text-black rounded-md" name="billing_due_date" value="{{ old('billing_due_date',@$field->billing_due_date)}}">
                Setiap Bulan dan Pembayaran Selambat-Lambatnya
                <input type="number" class="text-black rounded-md" name="billing_days" value="{{ old('billing_days',@$field->billing_days)}}">
                Hari
            </div>

            <div class="text-xl mt-7">Rekening JagooIT</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Atas Nama
                    <input type="text" class="rounded-md text-black" name="authorized_by" value="{{ old('authorized_by',@$field->authorized_by)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    Nama Bank
                    <input type="text" class="rounded-md text-black" name="bank_name" value="{{ old('bank_name',@$field->bank_name)}}">
                </div>
            </div>
            <div class="flex-auto flex flex-col">
                No. Rekening
                <input type="text" class="rounded-md text-black" name="account_number" value="{{ old('account_number',@$field->account_number)}}">
            </div>

            <div class="text-xl mt-7">Mengetahui</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Direktur JagooIT
                    <input type="text" class="rounded-md text-black" name="jagoit_director" value="{{ old('jagoit_director',@$field->jagoit_director)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    Direktur Klien
                    <input type="text" class="rounded-md text-black" name="client_director" value="{{ old('client_director',@$field->client_director)}}">
                </div>
            </div>
            
            <div class="mt-4 flex justify-end">
                <button type="submit" name="createWord" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
            </div>

        </div>
    
        <form method="post">
            @csrf
            <div class="overflow-auto bg-darkSecondary mt-5 justify-between flex flex-col text-lightGrey px-8 py-10 rounded-md space-y-3">
                <div>File PKS (1 file, pdf)</div>
                <div class="flex flex-row space-x-2">
                    <div class="flex-auto flex flex-col">
                        <div class="flex justify-center items-center bg-white py-2 rounded-lg h-[56px] w-[335px]">
                            <input id="file-cv" type="file" class="text-black rounded-lg hidden bg-white" name="">
                            <label for="file-cv" class="cursor-pointer">
                                <i class="ri-upload-2-fill text-3xl text-black"></i>
                            </label>
                        </div>
                    </div>
                    <div class="">
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
        </form>

        <div class=" flex justify-between items-center pt-4 md:mb-0">
            <div>
                <a href="/client/order/plan/percobaan" class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                    <p class=" hidden md:inline">Back</p>        
                    <i class="ri-arrow-left-line inline md:hidden"></i>  
                </a>
            </div>
            
            <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
                <div></div>
                <div>
                    <button name="save" class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">Save</button>
                </div>
    
                <div>
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                      <p class=" hidden md:block">Continue</p> 
                      <i class="ri-arrow-right-line block md:hidden"></i>
                    </button>
                </div>
            </div>
        </div>
</form>
    </div>
@endsection
