@extends('admin.layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Activity</title>
    <style>
    ::placeholder {
        color: #999; 
    }
    textarea {
        display: block;
        width: 100%;
        padding: 8px;
        margin: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical; /* Agar dapat diresize secara vertikal */
    }
    </style>
</head>
<body>
<h6 class="text-2xl font-semibold mb-4 ml-36">Create Activity</h6>
<div class="bg-gray-500 p-6 rounded-lg shadow-lg mx-auto w-[900px] h-[500px]"> 
        
        <select id="formSelector" class="mb-4 bg-gray-500 border border-none rounded-md py-1">Appointment
            <option value="form1">Appointment</option>
            <option value="form2">Note</option>
            <option value="form3">Report</option>
        </select>
            <div id="formContainer" class="w-full">
                <form id="form1" class="hidden">
                    <textarea name="judul" id="judul" class="bg-gray-300 mb-2 p-2 border rounded w-full" placeholder="Judul"></textarea> <!-- Menggunakan w-full untuk mengisi textarea secara penuh -->
                    <div class="flex mb-5">
                        <textarea name="lokasi" id="lokasi" class="bg-gray-300 p-2 border rounded mr-2 flex-1" placeholder="lokasi"></textarea>
                        <textarea name="waktu" id="waktu" class="bg-gray-300 p-2 border rounded flex-1" placeholder="waktu"></textarea>
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
                        <input type="submit" class="bg-secondary text-white rounded-md mt-4 mr-3 px-4 py-2 h-[37px]">
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
