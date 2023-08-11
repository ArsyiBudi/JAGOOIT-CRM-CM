@extends('admin.layouts.main')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0; /* Width of the scrollbar */
    }
</style>
@section('container')
<div id="formContainer">


    <form class="mt-10 hidden" id="form3">
        <h1 class="text-3xl font-semibold text-white">Create Order</h1>
        <div class="bg-primary rounded shadow-lg mt-6 p-6 h-[calc(50vh-50px)] overflow-y-auto hide-scrollbar">
            
            <div class="border-b pb-3 mb-6">
                <h2 class="text-2xl font-semibold text-white">New Order</h2>
            </div>
            <div class="mb-4 flex items-center gap-4">
                <label for="order-id" class="text-sm text-white">Order/Request ID</label>
                <input id="order-id" type="text" disabled class="text-black rounded-lg px-2 py-1 bg-gary">
            </div>
    
            <div class="mb-4">
                <label for="nama-perusahaan" class="text-sm text-white">Nama Perusahaan</label>
                <input id="nama-perusahaan" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>
    
            <div class="flex   gap-4">
                <div class="w-full md:w-1/2 mb-4">
                    <label for="posisi" class="text-sm text-white">Posisi yang Dibutuhkan</label>
                    <input id="posisi" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
                </div>
    
                <div class="w-full md:w-1/4 mb-4">
                    <label for="jumlah" class="text-sm text-white">Jumlah</label>
                    <input id="jumlah" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
                </div>
    
                <div class="w-full md:w-1/4 mb-4">
                    <label for="due-date" class="text-sm text-white">Due Date</label>
                    <input id="due-date" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
                </div>
            </div>
    
            <div class="mb-4">
                <label for="job-description" class="text-sm text-white">Job Description</label>
                <input id="job-description" type="text" class="text-black rounded-lg px-2 py-1 w-full bg-white">
            </div>
    
            <div class="flex gap-4">
    
            
                <div class="flex flex-col gap-4 md:w-1/2">
                    <div class="w-full  ">
                        <label for="kriteria-keterampilan" class="text-sm text-white">Kriteria Keterampilan</label>
                        <input id="kriteria-keterampilan" type="text" class="text-black rounded-lg px-2 py-4 h-32 w-full bg-white">
                    </div>
                    
                    <div class="w-full  mb-4">
                        <label for="file-tor" class="text-sm text-white">File TOR</label>
                        <input id="file-tor" type="text" class="text-black rounded-lg px-2 py-4 h-24  w-full bg-white">
                    </div>
                </div>
                
                <div class="flex flex-col gap-4 md:w-1/2">
                    <div class="w-full">
                        <label for="anggaran" class="text-sm text-white">Anggaran</label>
                        <input id="anggaran" type="text" class="text-black rounded-lg px-2 py-4 w-full bg-white">
                    </div>
                    
                    <div class="w-full mb-4">
                        <label for="kriteria-karakteristik" class="text-sm text-white">Kriteria Karakteristik</label>
                        <input id="kriteria-karakteristik" type="text" class="text-black rounded-lg px-2 py-4 w-full h-[10.5rem] bg-white">
                    </div>
                </div>
            </div>
    
    
            <div class="flex justify-end mt-6">
                <button class="bg-secondary text-white rounded-md px-4 py-2 mr-2">Cancel</button>
                <button class="bg-secondary text-white rounded-md px-4 py-2">Create</button>
            </div>
        </div>
    </form>
</div>

<h6 class=" font-normal mb-4 text-4xl">Create Offer</h6>
<div class="bg-grey p-9 rounded-lg border-2 border-white  w-full h-[500px] overflow-y-scroll hide-scrollbar" id="createSection"> 
        
        <select id="formSelector" class="mb-4 bg-transparent border outline-none border-none rounded-md py-1 text-3xl">
            <option value="form1" class="bg-grey">Send Email</option>
            <option value="form2" class="bg-grey">Appointment</option>
            <option value="form3" class="bg-grey">New Order</option>
        </select>
            <div id="formContainer" class="w-full">
                <form id="form1" class="hidden">
                    <div class="bg-white opacity-70 rounded-md w-full mb-4 p-2">
                        <textarea name="subjek" id="subjek" class="bg-transparent p-2 outline-none text-black w-full resize-none" placeholder="Subjek"></textarea>
                    </div>
                    <div class="bg-white opacity-70 rounded-md w-full mb-2 p-2 h-[200px]">
                        <textarea name="deskripsinote" id="deskripsinote" class="bg-transparent p-2 outline-none text-black w-full h-full resize-none" placeholder="Deskripsi"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                    </div>
                    <div class="w-[97px] mx-auto">
                        <input type="submit" class="bg-secondary text-white rounded-md px-4 mt-5 py-2 h-[37px]">
                    </div>
                </form>
                <form id="form2" class="hidden">
                    <div class="bg-white opacity-70 mb-4 p-2 rounded-md w-full">
                        <textarea name="judul" id="judul" class="text-black opacity-100 w-full p-2 bg-transparent outline-none resize-none" placeholder="Judul"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                    </div>
                    <div class="flex gap-2 mb-4 w-full">
                        <div class="bg-white opacity-70 rounded-md mr-2 w-1/2 p-2">
                            <textarea name="lokasi" id="lokasi" class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Lokasi"></textarea>
                        </div>
                        <div class="bg-white opacity-70 rounded-md  w-1/2 p-2">
                            <textarea name="waktu" id="waktu" class="bg-transparent text-black p-2 w-full outline-none resize-none" placeholder="Waktu"></textarea>
                        </div>
                        
                    </div>
                    <div class="bg-white opacity-70 rounded-md w-full p-2 h-[100px]">
                        <textarea name="deskripsi" id="deskripsi" class="bg-transparent outline-none p-2 text-black resize-none h-full w-full" placeholder="Deskripsi"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                    </div>
                    <div class="w-[97px] mx-auto">
                        <input type="submit" class="bg-secondary  text-white rounded-md px-4 py-2 h-[37px] mt-11">
                    </div>
                </form>
                
                      
            </div>
</div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const formSelector = document.getElementById("formSelector");
            const formContainer = document.getElementById("formContainer");
            const createSection = document.getElementById("createSection");

            formSelector.addEventListener("change", function () {
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
                    createSection.classList.add("h-fit");
                } else {
                    createSection.classList.remove("h-fit");
                }
            });
            
            // Inisialisasi dengan menampilkan Formulir 1 secara default
            document.getElementById("form1").style.display = "block";
            
        });
    </script>
@endsection
