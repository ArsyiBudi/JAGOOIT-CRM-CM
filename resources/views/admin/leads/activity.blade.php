@extends('admin.layouts.main')

@section('container')
<h6 class=" font-normal mb-4 text-4xl">Create Activity</h6>
<div class="bg-grey p-9 rounded-lg border-2 border-white  w-full h-[500px]"> 
        
        <select id="formSelector" class="mb-4 bg-transparent border outline-none border-none rounded-md py-1 text-3xl">
            <option value="form1" class="bg-grey">Appointment</option>
            <option value="form2" class="bg-grey">Note</option>
            <option value="form3" class="bg-grey">Report</option>
        </select>
            <div id="formContainer" class="w-full">
                <form id="form1" class="hidden">
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
                <form id="form2" class="hidden">
                    <div class="bg-white opacity-70 rounded-md w-full mb-2 p-2 h-[270px]">
                        <textarea name="deskripsinote" id="deskripsinote" class="bg-transparent p-2 outline-none text-black w-full h-full resize-none" placeholder="Deskripsi"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                    </div>
                    <div class="w-[97px] mx-auto">
                        <input type="submit" class="bg-secondary text-white rounded-md px-4 mt-5 py-2 h-[37px]">
                    </div>
                </form>
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
            </div>
</div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const formSelector = document.getElementById("formSelector");
            const formContainer = document.getElementById("formContainer");

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
            });
            
            // Inisialisasi dengan menampilkan Formulir 1 secara default
            document.getElementById("form1").style.display = "block";
        });
    </script>
@endsection