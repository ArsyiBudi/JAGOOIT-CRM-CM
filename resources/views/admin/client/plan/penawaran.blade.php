@extends('admin.layouts.main')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0;
        /* Width of the scrollbar */
    }

    .custom-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1);
        /* This inverts the icon color */
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

@section('container')

    @if(session()->has('error'))
        <div class="alert alert-error absolute top-10 right-10 w-auto animate-slide-up text-white font-medium border-2 border-red-500 cursor-pointer" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

       @if(session()->has('message'))
        <div class="alert alert-success absolute top-10 right-10 w-auto animate-slide-up text-white font-medium border-2 border-green-300 cursor-pointer" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif

<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class="hide-scrollbar overflow-x-hidden overflow-y-auto pt-0 h-[90vh] md:pr-5 px-5 md:px-0">
    <h1 class=" text-4xl">Penawaran</h1>
    <p class=" text-[16px] font-medium pt-3">Silakan buat surat penawaran</p>

    <div class=" mt-5  w-full overflow-auto md:overflow-hidden">
        <ul class=" mx-0 md:mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step">
            </li>
            <li class="step">
            </li>
            <li class="step"></li>
            <li></li>
        </ul>
    </div>
    <div class="bg-grey rounded shadow-lg mt-6 p-6  ">
        <div class="border-b pb-3 mb-6">
            <h2 class="text-2xl md:text-4xl text-white">Form Generate Surat Penawaran</h2>
        </div>

        <div class="mb-4">
            <div>
                <p class="gap-4">Outsourcing Detail</p>
                <div class=" flex items-center gap-2 flex-wrap mt-2">
                    <div class=" detail-container flex gap-2">
                        @if($offer -> offerJob)
                        @foreach($offer -> offerJobDetails as $data)
                        <div
                            class="bg-white text-black text-opacity-50 text-sm text-center py-1 px-7 rounded-md font-bold flex items-center gap-3">
                            <p>{{ $data->needed_job }} ({{ $data->quantity }})</p>
                            <form action="{{ url(request() -> path() . '/' . $data -> id) }}" method="post"
                                class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-lg cursor-pointer ri-delete-bin-2-line text-delete"></button>
                            </form>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <button type="button"
                        class="btn bg-white text-darkSecondary text-opacity-50 text-sm text-center py-2 px-3  rounded-md font-bold hover:scale-95 duration-200 hover:bg-white"
                        onclick="my_modal_5.showModal()">Add Detail +</button>
                </div>
            </div>
        </div>

        <form class="" action="{{ url(request()->path()) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="perihal" class="text-sm text-white">Perihal</label>
                <input value="{{ old('offer_subject', @$offer->offer_subject) }}" name="offer_subject" id="perihal"
                    type="text" class="mt-1 text-black rounded-md px-2 py-2 w-full bg-white" placeholder="Perihal">
            </div>

            <div class=" block md:flex items-center gap-4">
                <div class="w-full md:w-1/2 mb-4">
                    <label for="kepada" class="text-sm text-white">Kepada</label>
                    <input value="{{ old('recipient_name', @$offer->recipient_name) }}" name="recipient_name"
                        id="kepada" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white"
                        placeholder="Kepada">
                </div>

                <div class="w-full md:w-1/4 mb-4">
                    <label for="tempat" class="text-sm text-white">Tempat</label>
                    <input value="{{ old('location', @$offer->location) }}" name="location" id="tempat" type="text"
                        class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Bandung">
                </div>

                <div class="w-full md:w-1/4 mb-4">
                    <label for="tanggal" class="text-sm text-white">Tanggal</label>
                    <input value="{{ old('date', @$offer->date) }}" name="date" id="tanggal" type="date"
                        class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white">
                </div>
            </div>

            <div class=" block md:flex items-center gap-4">
                <div class=" w-full md:w-3/4">
                    <label for="ditawarkan" class="text-sm text-white">Hal yang Ditawarkan</label>
                    <input value="{{ old('context', @$offer->context) }}" name="context" id="ditawarkan" type="text"
                        class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white"
                        placeholder="Hal yang Ditawarkan">
                </div>

                <div class=" w-full md:w-1/4 mt-2 md:mt-0">
                    <label for="jumlah" class="text-sm text-white">Jumlah Talent</label>
                    <input value="{{ old('talent_total', @$offer->talent_total) }}" name="talent_total" id="jumlah"
                        type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Jumlah">
                </div>
            </div>



            <p class="mt-4">Biaya Overtime (perjam)</p>

            <div class=" block md:flex gap-4 mt-3 items-center justify-between w-full">
                <div class=" w-full md:w-1/2">
                    <label for="weekday" class="text-sm text-white">Weekday</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="weekday"
                            class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input name="weekday_cost" value="{{ old('weekday_cost', $offer -> weekday_cost) }}"
                            type="number" id="weekday" placeholder="Weekday Overtime"
                            class=" text-black bg-white w-full p-2 outline-none rounded-tr-md rounded-br-md ">
                    </div>
                </div>
                <div class=" w-full md:w-1/2 mt-2 md:mt-0">
                    <label for="Weekend" class="text-sm text-white">Weekend</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="Weekend"
                            class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input name="weekend_cost" value="{{ old('weekend_cost', $offer -> weekend_cost) }}"
                            type="number" id="Weekend" placeholder="Weekend Overtime"
                            class=" text-black bg-white w-full p-2 outline-none rounded-tr-md rounded-br-md">
                    </div>
                </div>
            </div>

            <p class="mt-4">Biaya Dinas Luar Kota</p>
            <div class=" block md:flex gap-4 mt-3 justify-between w-full">
                <div class=" w-full md:w-1/2">
                    <label for="konsumsi" class="text-sm text-white">Konsumsi (perhari)</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="konsumsi"
                            class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input name="consumption_cost" value="{{ old('consumption_cost', $offer -> consumption_cost) }}"
                            type="number" id="numberInput" placeholder="Konsumsi"
                            class=" text-black bg-white w-full p-2 outline-none rounded-tr-md rounded-br-md">
                    </div>
                </div>
                <div class=" w-full md:w-1/2 mt-2 md:mt-0">
                    <label for="transport" class="text-sm text-white">Transport Pulang-Pergi Standar JKT-BDG</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="transport"
                            class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input name="transportation_cost"
                            value="{{ old('transportation_cost', $offer -> transportation_cost) }}" type="number"
                            id="transport" placeholder="Transport"
                            class=" text-black bg-white w-full p-2 outline-none rounded-tr-md rounded-br-md">
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" name="create_offer"
                    class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
            </div>
    </div>
    </form>

    <form action="{{ url(request() -> path()) }}" method="POST">
        @csrf
        @method('patch')
        <div class="bg-grey rounded shadow-lg mt-6 p-6">
            <div class="w-full  mb-4 ">
                <label for="file-tor" class="text-sm text-white">File Surat Penawaran + CV (1 file, pdf)</label>

                <p id="file-name-preview" style="display: none;" class=" pt-3"></p>
                <div id="canvas-loading" class=" my-3 w-full hidden">
                    <span class="loading loading-dots loading-md "></span>
                </div>

                <canvas id="pdf-preview" style="display: none;" class="w-full rounded-md"></canvas>

                <label for="file-cv" id="container-cv"
                    class="flex justify-center items-center bg-white py-4 rounded-lg px-2 h-24 cursor-pointer mt-2">
                    <input required id="file-cv" type="file" name="cv_file"
                        class="text-black rounded-lg px-2 py-4 h-[56px] w-[337px] hidden bg-white" name="cv"
                        onchange="previewFile()">
                    <span id="file-upload-label" class=" text-white font-semibold cursor-pointer font-quicksand">
                        <i class="ri-upload-2-fill text-3xl text-black"></i>
                    </span>
                </label>
            </div>

            <div class="w-full">
                <label for="deskripsi" class="text-sm text-white">Deskripsi</label>
                <div class="rounded-lg px-2 py-4 h-24 w-full bg-white mt-2">
                    <textarea name="cv_desc" id="deskripsi" type="text" class="text-black bg-transparent outline-none h-full w-full hide-scrollbar resize-none">@if(@$order -> cv_description){{@$order -> cv_description}}@endif</textarea>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" name="sendCV"
                    class="bg-secondary text-white text-sm text-center w-full md:w-[188px] h-[37px] rounded-md hover:scale-95 duration-200">Send</button>
            </div>
        </div>

        <div class=" flex justify-between items-center pt-4 mb-5 md:mb-0">
            <div>
                <div>
                    <a href="{{ url('/client/order/plan/'. $order -> id .'/training') }}"
                        class="bg-grey text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center hover:scale-95 duration-200">
                        <p class="hidden md:block">Back</p>
                        <i class="ri-arrow-left-line block md:hidden ml-1"></i>
                    </a>
                </div>
            </div>

    </form>
    <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
        <div></div>
        <form action="{{ url(request() -> path() . '/save') }}" method="POST">
            @csrf
            <button type="submit" name="save"
                class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">
                <p class="hidden md:block">Save</p>
                <i class="ri-save-line block md:hidden"></i>
            </button>
        </form>
        <div>
            <div>
                <a href="{{ url('/client/order/plan/'.$order -> id.'/negosiasi') }}">
                    <div
                        class=" bg-grey text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                        <p class="hidden md:inline">Continue</p>
                        <i class="ri-arrow-right-line block md:hidden"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!--modal outsourcing-->
<dialog id="my_modal_5" class="modal  text-white">
    <form action="{{ url(request() -> path()) }}" method="post"
        class="modal-box bg-grey border-2 border-white w-11/12 max-w-7xl">
        @csrf
        @method('PUT')
        <table class=" w-full">
            <thead>
                <tr class=" border-b-[1px] border-white">
                    <td align="center" class="p-3">Kota</td>
                    <td align="center" class="p-3">Pekerjaan</td>
                    <td align="center" class="p-3">Qty</td>
                    <td align="center" class="p-3">Durasi Kontrak (max 12 bulan)</td>
                    <td align="center" class="p-3">Price</td>
                </tr>
            </thead>
            <tbody>
                <tr class=" bg-[#202020]/50">
                    <td class=" p-5 mt-2" align="center"><input type="text" name="city_location" id="domisili"
                            placeholder="Kota"
                            class="bg-white outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50"></td>
                    <td class=" p-5" align="center"><input id="dsc" name="needed_job" type="text"
                            class="bg-white outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50"
                            placeholder="Outsourcing IT Support"></td>
                    <td class=" p-5" align="center"><input id="qty" name="quantity" type="number"
                            class="bg-white outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50"
                            placeholder="12"></td>
                    <td class=" p-5" align="center"><input id="lamaKontrak" name="contract_duration" type="number"
                            class="bg-white outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50"
                            placeholder="11 Bulan"></td>
                    <td class=" p-5" align="center"><input id="price" name="price" type="number"
                            class="bg-white outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50"
                            placeholder="xxxxxxx"></td>
                </tr>
            </tbody>
        </table>
        <div class="modal-action">
            <button type="submit"
                class="btn bg-secondary text-white border-none hover:bg-secondary/50 hover:text-white/80">Save</button>
        </div>
    </form>
</dialog>



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

<script>
    
    const my_modal_5 = document.getElementById('my_modal_5');

    function showModal() {
        my_modal_5.showModal();
    }

    function hideModal() {
        my_modal_5.close();
    }

    async function previewFile() {
        const fileInput = document.getElementById('file-cv');
        const containerInput = document.getElementById('container-cv');
        const fileNamePreview = document.getElementById('file-name-preview');
        const canvas = document.getElementById('pdf-preview');
        const fileUploadLabel = document.getElementById('file-upload-label');
        const canvasLoading = document.getElementById('canvas-loading');



        if (fileInput.files && fileInput.files[0]) {
            fileUploadLabel.textContent = 'Ganti File';
            containerInput.style.width = 'auto';
            containerInput.style.height = 'auto';
            containerInput.style.backgroundColor = '#EC512E'
        } else {
            fileUploadLabel.innerHTML = '<i class="ri-upload-2-fill text-3xl text-black"></i>';
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

    function closeAlert() {
    const alertContainer = document.querySelector('.alert');
    alertContainer.style.display = 'none';
    }
</script>

@endsection