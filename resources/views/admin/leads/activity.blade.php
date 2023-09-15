@extends('admin.layouts.main')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0;
    }
        /* Width of the scrollbar */
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

@if(session()->has('error'))
<div class="alert alert-error absolute lg:top-10 lg:right-10 z-50 w-auto animate-slide-up text-white font-medium border-2 border-red-500 cursor-pointer flex items-center" onclick="closeAlert()">
    <span>{{ session('error') }}</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success absolute lg:top-10 lg:right-10 w-auto z-50 animate-slide-up text-white font-medium border-2 border-green-300 cursor-pointer flex items-center" onclick="closeAlert()">
    <span>{{ session('success') }}</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
</div>
@endif
@section('container')
{{-- <div id="formContainer">
    <form id="form3" class="hidden">
        <div class="bg-white opacity-70 rounded-md w-full mb-4 p-2">
            <textarea name="judulreport" id="judulreport" class="bg-transparent outline-none w-full p-2 resize-none text-black" placeholder="Judul"></textarea>
        </div>
        <div class="bg-white opacity-70 rounded-md w-full mb-4 p-4">
            <input type="file" name="file" id="file" class="hidden w-full" placeholder="file"></input>
            <label for="file" class="text-grey w-full block">File</label>
        </div>
        <div class="bg-white opacity-70 rounded-md w-full mb-4 p-2 h-[100px]">
            <textarea name="deskripsireport" id="deskripsireport" class="bg-transparent outline-none p-2  rounded w-full h-full resize-none text-black" placeholder="Deskripsi"></textarea> 
        </div>
        <div class="w-[97px] mx-auto">
            <input type="submit" class="bg-secondary text-white rounded-md mt-5 mr-3 px-4 py-2 h-[37px]">
        </div>
    </form>
</div> --}}
<div class=" overflow-auto h-[90vh]">
    <h6 class=" font-normal mb-4 text-2xl md:mt-0 mt-24 md:pl-0 pl-4 lg:text-left text-center">Create Activity</h6>
    <div class="bg-grey overflow-x-hidden md:p-9 p-4 rounded-lg border-2 border-white  w-full">
        <div class='dropdown'>
            <select id="formSelector" class="mb-3 bg-transparent border m-1 btn p-2 outline-none border-spacing-1 rounded-md py-1 text-1xl text-white font-quicksand hover:bg-gray-300 hover:text-darkSecondary">
                <option value="form1" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Appointment</option>
                <option value="form2" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Note</option>
                <option value="form3" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Report</option>
            </select>
        </div>

        <div id="formContainer" class="w-full">
            <form id="form1" class="hidden" method="POST" action="{{ url(request()->path() . '/appointment') }}" onsubmit="showModal()">
                @csrf
                @if($lead -> hasOneEmail)
                <div class="w-full flex items-center justify-start">
                    <select required name="email_name" id="email" class="mb-4 bg-transparent border m-1 btn p-2 outline-none border-spacing-1 rounded-md py-1 text-1xl hover:bg-gray-300 hover:text-darkSecondary text-white">
                        <option value="" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Select Email</option>
                        @foreach($lead -> emails as $email)
                        <option value="{{ $email -> email_name }}" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">{{ $email -> email_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="bg-white opacity-70 mb-4 p-2 rounded-md w-full">
                    <textarea required name="judul" id="judul" class="text-black opacity-100 w-full p-2 bg-transparent outline-none resize-none" placeholder="Judul"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                </div>
                <div class="flex gap-2 mb-4 w-full">
                    <div class="bg-white opacity-70 rounded-md mr-2 w-1/2 p-2">
                        <textarea required name="lokasi" id="lokasi" class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Lokasi"></textarea>
                    </div>
                    <div class="bg-white opacity-70 rounded-md  w-1/2 p-2">
                        <input required type="date" type="text" name="waktu" id="waktu" class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Waktu">
                    </div>

                </div>
                <div class="bg-white opacity-70 rounded-md w-full p-2 h-[100px]">
                    <textarea required name="deskripsi" id="deskripsi" class="bg-transparent outline-none p-2 text-black resize-none h-full w-full" placeholder="Deskripsi"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                </div>
                <div class="w-[97px] mx-auto">
                    <input type="submit" class="bg-secondary  text-white rounded-md px-4 py-2 h-[37px] mt-11 hover:scale-95 duration-200" >
                </div>
                @else
                {{ $lead -> business_name }} has no Email
                <a href="{{ url('leads/'. $lead -> id . '/edit') }}">Edit Leads</a>
                @endif
            </form>

            <form id="form2" class="hidden" method="POST" action="{{ url(request()->path() . '/note') }}">
                @csrf
                <div class="bg-white opacity-70 rounded-md w-full mb-2 p-2 h-[270px]">
                    <textarea required name="deskripsinote" id="deskripsinote" class="bg-transparent p-2 outline-none text-black w-full h-full resize-none" placeholder="Deskripsi">@if($lead -> hasNote){{ $lead->hasNote -> desc }}@endif</textarea>
                </div>
                <div class="w-[97px] mx-auto">
                    <input type="submit" class="bg-secondary text-white rounded-md px-4 mt-5 py-2 h-[37px] hover:scale-95 duration-200">
                </div>
            </form>

            <form id="form3" class="hidden" method="POST" action="{{ url(request()->path() . '/report') }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white opacity-70 rounded-md w-full mb-4 p-2">
                    <textarea required name="judulreport" id="judulreport" class="bg-transparent outline-none w-full p-2 resize-none text-black" placeholder="Judul"></textarea>
                </div>
                <div class="bg-white opacity-70 rounded-md w-full mb-4 p-4">
                    <label for="file" class="text-grey w-full block">File</label>
                    <p id="file-name-preview" style="display: none;" class=" pt-3"></p>
                    <div id="canvas-loading" class=" my-3 w-full hidden">
                        <span class="loading loading-dots loading-md "></span>
                    </div>
                    <canvas id="pdf-preview" style="display: none;" class=" w-full rounded-md"></canvas>
                    <label for="file-tor" id="container-tor" class="flex justify-center items-center bg-white py-4 rounded-lg px-2 h-24 mt-2">
                        <input required id="file-tor" type="file" name="file" class="outline-none text-black rounded-lg px-2 py-4 h-24 hidden w-full bg-white" name="tor" onchange="previewFile()">
                        <span id="file-upload-label" class=" text-white font-semibold cursor-pointer font-quicksand">
                            <i class="ri-upload-2-fill text-3xl text-black"></i>
                        </span>
                    </label>
                </div>
                <div class="bg-white opacity-70 rounded-md w-full mb-4 p-2 h-[100px]">
                    <textarea required name="deskripsireport" id="deskripsireport" class="bg-transparent outline-none p-2  rounded w-full h-full resize-none text-black" placeholder="Deskripsi"></textarea>
                </div>
                <div class="w-[97px] mx-auto">
                    <input type="submit" class="bg-secondary text-white rounded-md px-4 mt-5 py-2 h-[37px] hover:scale-95 duration-200">
                </div>
            </form>
        </div>
    </div>
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



function closeAlrt() {
    my_modal_5.close();
}

    document.addEventListener("DOMContentLoaded", function() {
        const formSelector = document.getElementById("formSelector");
        const formContainer = document.getElementById("formContainer");

        formSelector.addEventListener("change", function() {
            const selectedForm = formSelector.value;
            const forms = formContainer.getElementsByTagName("form");

            // Sembunyikan semua formulir
            for (const form of forms) {
                form.style.display = "none";
            }

            // Tampilkan formulir yang sesuai
            const selectedFormElement = document.getElementById(selectedForm);
            selectedFormElement.style.display = "block";
        });

        // Inisialisasi dengan menampilkan Formulir 1 secara default
        document.getElementById("form1").style.display = "block";
    });

    async function previewFile() {
        const fileInput = document.getElementById('file-tor');
        const containerInput = document.getElementById('container-tor');
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