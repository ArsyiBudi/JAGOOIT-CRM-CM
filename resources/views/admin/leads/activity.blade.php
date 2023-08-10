@extends('admin.layouts.main')
@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Activity</title>
</head>
<body>
<div class="bg-blac p-6 rounded-lg shadow-lg w-[400px]">
        <h1 class="text-2xl font-semibold mb-4">Create Activity</h1>
        <select id="formSelector" class="mb-4">
            <option value="form1">Appointment</option>
            <option value="form2">Note</option>
            <option value="form3">Report</option>
        </select>
        <div class="flex">
            <div id="formContainer">
                <!-- Konten formulir akan ditampilkan di sini -->
                <form id="form1" class="hidden">
                    <textarea name="judul" id="judul" class="bg-gray-400 mb-2 p-2 border rounded">Judul</textarea>
                    <textarea name="lokasi" id="lokasi" class="mb-2 p-2 border rounded"></textarea>
                    <textarea name="waktu" id="waktu" class="mb-2 p-2 border rounded"></textarea>
                    <textarea name="deskripsi" id="deskripsi" class="mb-2 p-2 border rounded"></textarea>
                    <input type="submit" class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[97px]">
                </form>
                <form id="form2" class="hidden">
                    <textarea name="deskripsinote" id="deskripsinote" class="mb-2 p-2 border rounded"></textarea>
                    <input type="submit" class="bg-secondary text-white rounded-md px-4 py-2 h-[37px] w-[97px]">
                </form>
            </div>
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
</body>
</html>
@endsection