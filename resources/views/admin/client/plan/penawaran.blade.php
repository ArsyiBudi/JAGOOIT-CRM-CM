@extends('admin.layouts.main')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0; /* Width of the scrollbar */
    }
    .custom-date-input::-webkit-calendar-picker-indicator {
    filter: invert(1); /* This inverts the icon color */
    }   
     input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
</style>

@section('container')
    <div class="pt-20 pb-2 lg:pt-0">
    </div>
    <div class="overflow-x-hidden overflow-y-auto pt-0 pb-10 h-[90vh] md:pr-5 px-5 md:px-0">
        <h1 class=" text-4xl">Penawaran</h1>
        <p class=" text-[16px] font-medium pt-3">Silakan pilih kandidat</p>

        <div class=" mt-5  w-full overflow-auto md:overflow-hidden">
            <ul class=" mx-0 md:mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
                <li  class="step step-primary">
                </li>
                <li  class="step step-primary">
                </li>
                <li class="step">
                </li>
                <li class="step">
                </li>
                <li class="step">
                </li>
                <li class="step"></li>
                <li></li>
            </ul>
        </div>

    <form class="" action="{{ route('penawaran.download') }}" method="POST">
        @csrf
        <div class=" mt-5">
            <div class=" block md:flex justify-end">
                <div class="flex gap-3 items-center w-full md:w-auto">
                    <label for="endDate">End Date: </label>
                    <input type="date" id="endDate" class=" custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                </div>
            </div>
        </div>

        <div class="bg-grey rounded shadow-lg mt-6 p-6  ">
            <div class="border-b pb-3 mb-6">
                <h2 class="text-2xl md:text-4xl text-white">Form Generate Surat Penawaran</h2>
            </div>
        
            <div class="mb-4">
                <label for="perihal" class="text-sm text-white">Perihal</label>
                <input required id="perihal" type="text" class="mt-1 text-black rounded-md px-2 py-2 w-full bg-white" placeholder="Perihal" name="perihal">
            </div>
        
            <div class=" block md:flex items-center gap-4">
                <div class="w-full md:w-1/2 mb-4">
                    <label for="kepada" class="text-sm text-white">Kepada</label>
                    <input required id="kepada" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Kepada" name="kepada">
                </div>
        
                <div class="w-full md:w-1/4 mb-4">
                    <label for="tempat" class="text-sm text-white">Tempat</label>
                    <input required id="tempat" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Bandung" name="tempat">
                </div>
        
                <div class="w-full md:w-1/4 mb-4">
                    <label for="tanggal" class="text-sm text-white">Tanggal</label>
                    <input required id="tanggal" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="03 Agustus 2023" name="tanggal">
                </div>
            </div>
        
            <div class=" block md:flex items-center gap-4">
                <div class=" w-full md:w-3/4">
                    <label for="ditawarkan" class="text-sm text-white">Hal yang Ditawarkan</label>
                    <input required id="ditawarkan" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Hal yang Ditawarkan" name="ditawarkan">
                </div>

                <div class=" w-full md:w-1/4 mt-2 md:mt-0">
                    <label for="jumlah" class="text-sm text-white">Jumlah Talent</label>
                    <input required id="jumlah" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Jumlah" name="jumlahTalent">
                </div>
            </div>

            <div class="mt-4">
                <div>
                    <p class="gap-4">Outsourcing Detail</p>
                    <div class=" flex items-center gap-2 flex-wrap mt-2">
                        <button type="button" class="bg-white text-darkSecondary text-opacity-50 text-sm text-center py-1 px-7  rounded-md font-bold flex items-center gap-3">
                            <p>Detail 1 </p>
                            <span>
                                <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                            </span>
                        <button>                                  
                        <button type="button" class="btn bg-white text-darkSecondary text-opacity-50 text-sm text-center py-2 px-3  rounded-md font-bold hover:scale-95 duration-200" onclick="my_modal_5.showModal()">Add Detail +</button>
                    </div>
                </div>
            </div>

            <p class="mt-4">Biaya Overtime (perjam)</p>
                
            <div class=" block md:flex gap-4 mt-3 items-center justify-between w-full">
                <div class=" w-full md:w-1/2">
                    <label for="weekday" class="text-sm text-white">Weekday</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="weekday" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input required type="number" id="weekday"  placeholder="Weekday Overtime" class="bg-white text-black w-full p-2 outline-none rounded-tr-md rounded-br-md" name="weekday">
                    </div>
                </div>
                <div class=" w-full md:w-1/2 mt-2 md:mt-0">
                    <label for="Weekend" class="text-sm text-white">Weekend</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="weekend" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input required type="number" id="Weekend"  placeholder="Weekend Overtime" class="bg-white text-black w-full p-2 outline-none rounded-tr-md rounded-br-md" name="weekend">
                    </div>
                </div>
            </div>

            <p class="mt-4">Biaya Dinas Luar Kota</p>

            <div class=" block md:flex gap-4 mt-3 justify-between w-full">
                <div class=" w-full md:w-1/2">
                    <label for="konsumsi" class="text-sm text-white">Konsumsi (perhari)</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="konsumsi" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input required type="number" id="konsumsi" placeholder="Konsumsi" class=" text-black bg-white w-full p-2 outline-none rounded-tr-md rounded-br-md" name="konsumsi">
                    </div>
                </div>
                <div class=" w-full md:w-1/2 mt-2 md:mt-0">
                    <label for="transport" class="text-sm text-white">Transport Pulang-Pergi Standar JKT-BDG</label>
                    <div class=" mt-2 flex items-center gap-0">
                        <label for="transport" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                        <input required type="number" id="transport" placeholder="Transport" class=" text-black bg-white w-full p-2 outline-none rounded-tr-md rounded-br-md" name="transPP">
                    </div>
                </div>
            </div>
                
                <div class="mt-4 flex justify-end">
                    <button type="submit" name="createWord" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
                </div>
        </div>
    </form>

    <form action="">
        <div class="bg-grey rounded shadow-lg mt-6 p-6">
            <div class="w-full  mb-4 ">
                <label for="file-tor" class="text-sm text-white">File Surat Penawaran + CV (1 file, pdf)</label>
                <label for="file-cv" class="flex justify-center items-center bg-white py-4 rounded-lg px-2 h-24 cursor-pointer mt-2">
                    <input id="file-cv" type="file" class="text-black rounded-lg px-2 py-4 h-[56px] w-[337px] hidden bg-white" name="tor">
                    <label for="file-cv" class="cursor-pointer">
                        <i class="ri-upload-2-fill text-3xl text-black"></i>
                    </label>
                </label>
            </div>

            <div class="w-full">
                <label for="deskripsi" class="text-sm text-white">Deskirpsi</label>
                <div class="rounded-lg px-2 py-4 h-24 w-full bg-white mt-2">
                    <textarea id="deskripsi" type="text" class="text-black bg-transparent outline-none h-full w-full hide-scrollbar resize-none"></textarea>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" name="sendCV" class="bg-secondary text-white text-sm text-center w-full md:w-[188px] h-[37px] rounded-md hover:scale-95 duration-200">Send</button>
            </div>
        </div>

        <div class=" flex justify-between items-center pt-4 mb-5 md:mb-0">
            <div>
                <div>
                    <a href="/client/order/plan/training" class="bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center hover:scale-95 duration-200">
                        <p class="hidden md:block">Back</p>
                        <i class="ri-arrow-left-line block md:hidden ml-1"></i>
                    </a>
                </div>

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
                    <a href="/client/order/plan/negosiasi">
                    <div class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                        <p class="hidden md:inline">Continue</p> 
                        <i class="ri-arrow-right-line block md:hidden"></i>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

    <!--modal outsourcing-->
    <dialog id="my_modal_5" class="modal  text-white">
        <form method="dialog" class="modal-box bg-grey border-2 border-white w-11/12 max-w-4xl">
            <table class=" w-full">
                <thead>
                    <tr class=" border-b-[1px] border-white">
                        <td align="center" class="p-3" >No</td>
                        <td align="center" class="p-3" >Deskirpsi</td>
                        <td align="center" class="p-3" >Qty</td>
                        <td align="center" class="p-3" >Durasi Kontrak (max 12 bulan)</td>
                    </tr>
                </thead>
                <tbody >
                    <tr class=" bg-[#202020]/50">
                        <td class=" p-5 mt-2" align="center">1</td>
                        <td class=" p-5" align="center"><input id="deskripsi" type="text" class=" outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50" placeholder="Outsourcing IT Support"></td>
                        <td class=" p-5" align="center"><input id="qty" type="text" class=" outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50" placeholder="12"></td>
                        <td class=" p-5" align="center"><input id="lamaKontrak" type="text" class=" outline-none rounded-md text-black p-2 placeholder:text-[#202020]/50" placeholder="11 Bulan"></td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-action">
                <button class="btn bg-secondary text-white border-none hover:bg-secondary/50 hover:text-white/80">Kembali</button>
                <button class="btn bg-secondary text-white border-none hover:bg-secondary/50 hover:text-white/80">Save  </button>
            </div>
        </form>
    </dialog>

    <script>
        // alert('halo')
        let outsourcing = {}

    </script>

@endsection