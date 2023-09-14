@extends('admin.layouts.main')

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .hide-scrollbar::-webkit-scrollbar {
        width: 0.4em;
        /* Width of the scrollbar */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb {
        background-color: #555555;
        /* Color of the scrollbar thumb */
        border-radius: 8px;
        /* Rounded corners for the scrollbar thumb */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #777777;
        /* Color of the scrollbar thumb on hover */
    }

    .hide-scrollbar::-webkit-scrollbar-track {
        background-color: #555555;
        /* Color of the scrollbar track */
    }

    .hide-scrollbar::-webkit-scrollbar-track:hover {
        background-color: #666666;
        /* Color of the scrollbar track on hover */
    }

    /* Customize the appearance of the scrollbar wheel */
    .hide-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #555555 #333333;
    }

    /* Customize the appearance of the scrollbar thumb icon */
    .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
        background-color: #fff;
        /* Color of the scrollbar thumb icon */
    }

    .custom-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1);
        /* This inverts the icon color */
    }
    .animate-slide-up {
    animation: slide-up 0.3s ease-in-out;
}

@keyframes slide-up {
    0% {
        transform: translateY(-10px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>

@section('container')
@if(session()->has('success'))
<div class="alert alert-success absolute top-10 right-10 w-auto animate-slide-up text-white font-medium border-2 border-green-300 cursor-pointer" onclick="closeAlert()">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>{{ session('success') }}</span>
</div>
@endif
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class="overflow-y-auto  pt-0 h-[90vh] pb-10 w-full rounded-md overflow-x-hidden">
    <h1 class="pl-4 text-4xl">PO & PKS</h1>
    <p class=" text-[16px] font-medium pl-4 pt-3">Silakan input data kontrak</p>

    <div class="mt-5  w-full ">
        <div class=" mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <a class="step step-primary" href="{{ route('fetchRecruitment', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary" href="{{ route('fetchTraining', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary" href="{{ route('fetchOffer', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary" href="{{ route('fetchNegosiasi', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary" href="{{ route('fetchPercobaan', ['order_id' => $order -> id]) }}">
            </a>
            <a class="step step-primary">
            </a>
            <a></a>
        </div>
    </div>
    <form action="{{ url(request()->path()) }}" method="post">
        @csrf
        <div class="overflow-auto bg-grey mt-5 justify-between flex flex-col text-white px-8 py-10 rounded-md gap-y-3">

            <div class="text-xl">JagooIT:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Nama
                    <input class="rounded-md text-black bg-white p-1 outline-none" type="text" name="employee_name" value="{{ old('employee_name',@$field->employee_name)}}" id="">
                </div>
                <div class="flex-auto flex flex-col ">
                    Jabatan
                    <input class="rounded-md text-black bg-white p-1 outline-none" type="text" name="employee_position" value="{{ old('employee_position',@$field->employee_position)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Alamat
                    <input class="rounded-md bg-white text-black p-1 outline-none" type="text" name="employee_address" value="{{ old('employee_address',@$field->employee_address)}}" id="">
                </div>
            </div>

            <div class="text-xl mt-7">Client:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Nama
                    <input class="rounded-md text-black bg-white p-1 outline-none" type="text" name="client_name" value="{{ old('client_name',@$field->client_name)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Jabatan
                    <input class="rounded-md bg-white text-black p-1 outline-none" type="text" name="client_position" value="{{ old('client_position',@$field->client_position)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Alamat
                    <input class="rounded-md bg-white text-black p-1 outline-none" type="text" name="client_address" value="{{ old('client_address',@$field->client_address)}}" id="">
                </div>
            </div>

            <div class="text-xl mt-7">Jangka Waktu Kontrak:</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div>Dari</div>
                <input class="rounded-md flex-auto text-black bg-white p-1 outline-none" type="date" name="start_date" value="{{ old('start_date',@$field->start_date)}}" id="">
                <div>Sampai</div>
                <input class="rounded-md flex-auto text-black bg-white  p-1 outline-none" type="date" name="end_date" value="{{ old('end_date',@$field->end_date)}}" id="">
            </div>

            <div class="text-xl mt-7">Biaya Kontrak</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Termasuk Biaya
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="included_fees" value="{{ old('included_fees',@$field->included_fees)}}" id="">
                </div>
                <div class="flex-auto flex flex-col">
                    Nominal
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="nominal_fees" value="{{ old('nominal_fees',@$field->nominal_fees)}}" id="">
                </div>
            </div>

            <div class="text-xl mt-7">Biaya Overtime (Perjam)</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    <div>Weekday</div>
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="weekday_cost" value="{{ old('weekday_cost',@$field->weekday_cost)}}">
                    <div>Weekend</div>
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="weekend_cost" value="{{ old('weekend_cost',@$field->weekend_cost)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    <label for="catatan-popks">Catatan</label>
                    <textarea id="catatan-popks" type="text" class=" text-black bg-white p-1 rounded-md h-full hide-scrollbar resize-none" name="notes">@if(@$field -> notes){{ @$field -> notes }}@endif</textarea>
                </div>
            </div>

            <div class="text-xl mt-7">Biaya Dinas</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    <div>Konsumsi (perhari)</div>
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="consumption_cost" value="{{ old('consumption_cost',@$field->consumption_cost)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    Transport Pulang-Pergi Standar JKT-BDG
                    <input type="text" class="rounded-md h-full text-black bg-white p-1 outline-none" name="transportation_cost" value="{{ old('transportation_cost',@$field->transportation_cost)}}">
                </div>
            </div>

            <div class="text-xl mt-7">Invoice Tagihan</div>
            <div class="flex flex-row flex-wrap gap-2">
                Tanggal
                <input type="number" class="w-10 text-black bg-white rounded-md p-1 outline-none" name="billing_due_date" value="{{ old('billing_due_date',@$field->billing_due_date)}}">
                Setiap Bulan dan Pembayaran Selambat-Lambatnya
                <input type="number" class="text-black bg-white rounded-md p-1 outline-none" name="billing_days" value="{{ old('billing_days',@$field->billing_days)}}">
                Hari
            </div>

            <div class="text-xl mt-7">Rekening JagooIT</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Atas Nama
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="authorized_by" value="{{ old('authorized_by',@$field->authorized_by)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    Nama Bank
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="bank_name" value="{{ old('bank_name',@$field->bank_name)}}">
                </div>
            </div>
            <div class="flex-auto flex flex-col">
                No. Rekening
                <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="account_number" value="{{ old('account_number',@$field->account_number)}}">
            </div>

            <div class="text-xl mt-7">Mengetahui</div>
            <div class="flex flex-row flex-wrap gap-2">
                <div class="flex-auto flex flex-col">
                    Direktur JagooIT
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="jagoit_director" value="{{ old('jagoit_director',@$field->jagoit_director)}}">
                </div>
                <div class="flex-auto flex flex-col">
                    Direktur Klien
                    <input type="text" class="rounded-md text-black bg-white p-1 outline-none" name="client_director" value="{{ old('client_director',@$field->client_director)}}">
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" name="createWord" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
            </div>

        </div>
    </form>

    <form action="{{ url(request()->path()) }}" method="POST" enctype="multipart/form-data" onsubmit="showModal()">
        @csrf
        @method('PATCH')
        <div class="overflow-auto bg-grey mt-5 justify-between flex flex-col text-lightGrey px-8 py-10 rounded-md space-y-3">
            @if($order -> leadData -> hasOneEmail)
            <div class="w-full">
                <select name="email_name" id="email" class="mb-4 bg-transparent border btn p-2 outline-none border-spacing-1 rounded-md py-1 text-1xl hover:bg-gray-300 hover:text-darkSecondary text-white">
                    <option value="" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Select Email</option>
                    @foreach($order -> leadData -> emails as $email) 
                    <option value="{{ $email -> email_name }}" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">{{  $email -> email_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>File PKS (1 file, pdf)</div>
            <div class="flex flex-row space-x-2">
                <div class="flex-auto flex flex-col">
                    <p id="file-name-preview" style="display: none;" class=" pt-3"></p>
                    <div id="canvas-loading" class=" my-3 w-full hidden">
                        <span class="loading loading-dots loading-md "></span>
                    </div>

                    <canvas id="pdf-preview" style="display: none;" class=" w-full rounded-md my-3"></canvas>
                    <label for="file-pks" class="flex justify-center items-center cursor-pointer bg-white py-2 rounded-lg h-[56px] w-full" id="container-pks">
                        <input id="file-pks" type="file" class="text-black rounded-lg hidden bg-white p-1 outline-none" name="file-pks" onchange="previewFile()">
                        <span id="file-upload-label" class=" text-white font-semibold cursor-pointer font-quicksand">
                            <i class="ri-upload-2-fill text-3xl text-black"></i>
                        </span>
                    </label>
                </div>
            </div>

            
            <div class="flex-auto flex flex-col">
                <label for="desk-popks">Deskripsi</label>
                <textarea id="desk-popks" type="text" class="p-1 outline-none rounded-md h-[70px] text-black hide-scrollbar resize-none bg-white" name="po_descr">@if(@$order -> po_description){{ $order -> po_description }} @endif</textarea>
            </div>
            
            

            <div class="mt-4 flex justify-end">
                <button type="submit" name="Send" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200" >Send</button>
            </div>
            @else
            {{ $order -> leadData -> business_name }} has no Email
            <a href="{{ url('leads/'. $order -> leadData -> id . '/edit') }}">Edit Leads</a>
            @endif
        </div>
    </form>

    <div class=" flex justify-between items-center pt-4 md:mb-0">
        <div>
            <a href="{{ url('/client/order/plan/'. $order -> id .'/percobaan') }}" class=" bg-grey text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                <p class=" hidden md:inline">Back</p>
                <i class="ri-arrow-left-line inline md:hidden"></i>
            </a>
        </div>

        <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
            <div></div>
            <div>
                <form action="{{ url(request()->path()) }}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" name="save" class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">Save</button>
                </form>
            </div>

            <div>
                <a href="{{ url('/client/order') }}">
                    <button class=" bg-grey text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                        <p class=" hidden md:block">Exit</p>
                        <i class="ri-arrow-right-line block md:hidden"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
    </form>

    
</div>



<dialog id="my_modal_5" class="modal  text-white">

    <div class="modal-box bg-grey border-2 border-white w-11/12 max-w-xs flex justify-center items-center">

        <h1>Email sedang dikirim...</h1>

        {{-- <div onclick="closeAlrt()">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" onclick="closeAlrt()"/></svg>
        </div> --}}

    </div>
</dialog>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

<script>
    const my_modal_5 = document.getElementById('my_modal_5');

    function showModal() {
        my_modal_5.showModal();
    }

    function closeAlert() {
        const alertContainer = document.querySelector('.alert');
        alertContainer.style.display = 'none';
    }

    function closeAlrt() {
        my_modal_5.close();
    }

    async function previewFile() {
        const fileInput = document.getElementById('file-pks');
        const containerInput = document.getElementById('container-pks');
        const fileNamePreview = document.getElementById('file-name-preview');
        const canvas = document.getElementById('pdf-preview');
        const fileUploadLabel = document.getElementById('file-upload-label');
        const canvasLoading = document.getElementById('canvas-loading');



        if (fileInput.files && fileInput.files[0]) {
            fileUploadLabel.textContent = 'Ganti File';
            containerInput.style.width = '355px';
            containerInput.style.height = 'auto';
            containerInput.style.backgroundColor = '#EC512E'
        } else {
            fileUploadLabel.innerHTML = '<i class="ri-upload-2-fill text-3xl text-black bg-white"></i>';
        }

        if (fileInput.files && fileInput.files[0]) {
            canvasLoading.style.display = 'block';
            const file = fileInput.files[0];
            const fileURL = URL.createObjectURL(file);

            fileNamePreview.style.color = 'white'
            fileNamePreview.textContent = file.name;
            fileNamePreview.style.display = 'block';

            if (file.type === 'application/pdf') {

                const loadingTask = pdfjsLib.getDocument(fileURL);
                const pdf = await loadingTask.promise;

                const pageNum = 1;
                const page = await pdf.getPage(pageNum);

                const viewport = page.getViewport({
                    scale: 1
                });
                canvas.width = viewport.width;
                canvas.height = 200;

                const renderContext = {
                    canvasContext: canvas.getContext('2d'),
                    viewport
                };

                await page.render(renderContext).promise;
                canvas.style.display = 'block';
                canvasLoading.style.display = 'none';

            } else {
                canvas.style.display = 'none';
                fileNamePreview.textContent = 'File harus berupa PDF!';
                fileNamePreview.style.color = 'red'
                canvasLoading.style.display = 'none';
            }
        } else {
            fileNamePreview.style.display = 'none';
            canvas.style.display = 'none';
        }
    }
</script>



@endsection