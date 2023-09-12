@extends('admin.layouts.main')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0;
        /* Width of the scrollbar */
    }
</style>
@section('container')
{{-- <div id="formContainer"> --}}

<form class=" hidden mt-24 md:mt-0 text-center lg:text-left" id="form3" action="{{ route('create_order') }}" method="post">
    @csrf
    <h1 class="text-3xl font-semibold text-white">Create Order</h1>
    <div class="bg-primary rounded shadow-lg mt-6 p-6 h-[calc(85vh-85px)] overflow-y-auto hide-scrollbar">

        <div class="border-b pb-3 mb-6">
            <h2 class="text-2xl font-semibold text-white">New Order</h2>
        </div>

        <div class="mb-4 block md:flex items-center gap-4">
            <label for="order-id" class="text-sm text-white">Order/Request ID</label> <br class=" block md:hidden">
            <input readonly id="order-id" type="text" name="id" class="text-black rounded-lg px-2 py-1 bg-gary w-full md:w-auto mt-2 outline-none read-only" value="{{ $randomId }}">
        </div>

        <div class="mb-4">
            <label for="nama-perusahaan" class="text-sm text-white">Nama Perusahaan</label>
            <select name="business_id" id="" class=" w-full rounded-md mt-2 bg-white py-2 px-3 outline-none text-black">
                <option value="{{ $lead->id }}">{{ $lead->business_name }}</option>
            </select>
        </div>

        <div class=" flex flex-wrap md:flex-nowrap gap-4">
            <div class="w-full md:w-1/2 mb-4">
                <label for="posisi" class="text-sm text-white">Posisi yang Dibutuhkan</label>
                <input required id="posisi" type="text" name="desired_position" class=" outline-none text-black rounded-lg px-2 py-1 w-full bg-white mt-1 md:mt-0" placeholder="Posisi">
            </div>

            <div class="w-1/5 md:w-1/2 mb-4">
                <label for="jumlah" class="text-sm text-white">Jumlah</label>
                <input required id="jumlah" type="number" name="needed_qty" class="outline-none text-black rounded-lg px-2 py-1 w-full bg-white mt-1 md:mt-0" placeholder="Jumlah">
            </div>

            <div class=" w-1/2 md:w-1/2 mb-4">
                <label for="due-date" class="text-sm text-white">Due Date</label>
                <input required type="date" id="due-date" type="text" name="due_date" class="outline-none text-black rounded-lg px-2 py-1 w-full bg-white mt-1 md:mt-0" placeholder="Tanggal">
            </div>
        </div>

        <div class="mb-4">
            <label for="job-description" class="text-sm text-white">Job Description</label>
            <input required id="job-description" type="text" name="description" class="outline-none text-black rounded-lg px-2 py-1 w-full bg-white mt-2" placeholder="Deskripsi">
        </div>

        <div class=" block md:flex gap-4">
            <div class="flex flex-col gap-4 md:w-1/2">
                <div class="w-full">
                    <label for="kriteria-keterampilan" class="text-sm text-white">Kriteria Keterampilan</label>
                    <div class="rounded-lg px-2 py-4 h-32 w-full bg-white mt-2">
                        <textarea required id="kriteria-keterampilan" type="text" name="skills_desc" class="outline-none text-black bg-transparent  h-full w-full hide-scrollbar resize-none" placeholder="Keterampilan"></textarea>
                    </div>
                </div>

                <div class="w-full  mb-4 ">
                    <label for="file-tor" class="text-sm text-white">File TOR ( PDF )</label>
                    <p id="file-name-preview" style="display: none;" class=" pt-3"></p>
                    <div id="canvas-loading" class=" my-3 w-full hidden">
                        <span class="loading loading-dots loading-md "></span>
                    </div>
                    <canvas id="pdf-preview" style="display: none;" class=" w-full rounded-md"></canvas>
                    <label for="file-tor" id="container-tor" class="flex justify-center items-center bg-white py-4 rounded-lg px-2 h-24 mt-2">
                        <input required id="file-tor" type="file" name="tor_file" class="outline-none text-black rounded-lg px-2 py-4 h-24 hidden w-full bg-white" name="tor" onchange="previewFileTor()">
                        <span id="file-upload-label" class=" text-white font-semibold cursor-pointer font-quicksand">
                            <i class="ri-upload-2-fill text-3xl text-black"></i>
                        </span>
                    </label>
                </div>
            </div>

            <div class="flex flex-col gap-4 md:w-1/2">
                <div class="w-full">
                    <label for="anggaran" class="text-sm text-white">Anggaran</label>
                    <input required id="anggaran" type="number" name="budget_estimation" class="outline-none text-black rounded-lg px-2 py-4 w-full bg-white mt-2" placeholder="Anggaran">
                </div>

                <div class="w-full mb-4">
                    <label for="kriteria-karakteristik" class="text-sm text-white">Kriteria Karakteristik</label>
                    <div class="rounded-lg px-2 py-4 w-full h-[10.5rem] bg-white mt-2">
                        <textarea required id="kriteria-karakteristik" type="text" name="characteristic_desc" class="outline-none text-black bg-transparent  h-full w-full hide-scrollbar resize-none" placeholder="Karakteristik"></textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-end mt-6">
            <button type="button" class="bg-secondary text-white rounded-md px-4 py-2 mr-2 hover:scale-95 duration-200" onclick="dropDownBack()">Cancel</button>
            <button type="submit" class="bg-secondary text-white rounded-md px-4 py-2 hover:scale-95 duration-200">Create</button>
        </div>
    </div>
</form>

{{-- </div> --}}

<h6 class="mt-24 md:mt-0 text-center lg:text-left font-normal mb-4 text-2xl" id="offerTitle">Create Offer</h6>
<div class="bg-grey p-9 rounded-lg border-2 border-white  w-full h-[500px] overflow-y-scroll hide-scrollbar" id="createSection">
    <div class='dropdown'>
        <select id="formSelector" class="mb-4 bg-transparent border m-1 btn p-2 outline-none border-spacing-1 rounded-md py-1 text-1xl hover:bg-gray-300 hover:text-darkSecondary text-white">
            <option value="form1" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Send Email</option>
            <option value="form3" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">New Order</option>
        </select>
    </div>
    <div id="formContainer" class="w-full">
        <form id="form1" class="hidden" action="{{ url(request() -> path()) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($lead -> hasOneEmail)
            <select name="email_name" id="email" class="mb-4 bg-transparent border m-1 btn p-2 outline-none border-spacing-1 rounded-md py-1 text-1xl hover:bg-gray-300 hover:text-darkSecondary text-white">
                <option value="" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">Select Email</option>
                @foreach($lead->emails as $email)
                <option value="{{ $email -> email_name }}" class="bg-grey hover:bg-gray-300 hover:text-darkSecondary">{{ $email -> email_name }}</option>
                @endforeach
            </select>
            @else
            {{ $lead -> business_name }} doesn't have an email
            @endif
            <div class="w-full mb-4">
                <label for="file-brosur" class="text-sm text-white">File Brosur</label>

                <p id="file-name-preview" style="display: none;" class="pt-3"></p>
                <div id="canvas-loading" class="my-3 w-full hidden">
                    <span class="loading loading-dots loading-md"></span>
                </div>

                <canvas id="pdf-preview" style="display: none;" class="w-full rounded-md"></canvas>

                <label for="file-brosur" id="container-brosur" class="flex justify-center items-center bg-white py-4 rounded-lg px-2 h-24 cursor-pointer mt-2">
                    <input required id="file-brosur" type="file" name="attachment" class="text-black rounded-lg px-2 py-4 h-[56px] w-[337px] hidden bg-white" onchange="previewFile()">
                    <span id="file-upload-label" class="text-white font-semibold cursor-pointer font-quicksand">
                        <i class="ri-upload-2-fill text-3xl text-black"></i>
                    </span>
                </label>
            </div>
            <div class="bg-white opacity-70 rounded-md w-full mb-4 p-2">
                <textarea required name="subject" id="subjek" class="bg-transparent p-2 outline-none text-black w-full resize-none" placeholder="Subjek"></textarea>
            </div>
            <div class="bg-white opacity-70 rounded-md w-full mb-2 p-2 h-[200px]">
                <textarea required name="description" id="deskripsinote" class="bg-transparent p-2 outline-none text-black w-full h-full resize-none" placeholder="Deskripsi"></textarea>
            </div>
            <div class="w-[97px] mx-auto">
                <input type="submit" class="bg-secondary text-white rounded-md px-4 mt-5 py-2 h-[37px] cursor-pointer hover:scale-95 duration-200">
            </div>
        </form>
        {{-- <form id="form3" class="hidden"></form> --}}

    </div>
</div>

{{-- library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>


<script>
    async function previewFile() {
        const fileInput = document.getElementById('file-brosur');
        const containerInput = document.getElementById('container-brosur');
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
</script>
<script>
async function previewFileTor() {
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

            const viewport = page.getViewport({ scale: 1 });
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const formSelector = document.getElementById("formSelector");
        const formContainer = document.getElementById("formContainer");

        formSelector.addEventListener("change", function() {
            const offerTitle = document.getElementById("offerTitle");
            const selectedForm = formSelector.value;
            const forms = formContainer.getElementsByTagName("form");

            // Sembunyikan semua formulir
            for (const form of forms) {
                form.style.display = "none";
            }

            // Tampilkan formulir yang sesuai
            const selectedFormElement = document.getElementById(selectedForm);
            selectedFormElement.style.display = "block";

            if (selectedForm === "form3") {
                createSection.style.display = "none";
                offerTitle.style.display = "none";
            } else {
                createSection.style.display = "block";
                offerTitle.style.display = "block";
            }
        });

        function dropDownBack() {
            document.getElementById("form3").style.display = "block";
            document.getElementById("form1").style.display = "block";
        }

        // Inisialisasi dengan menampilkan Formulir 1 secara default
        document.getElementById("form1").style.display = "block";
    });
</script>
@endsection