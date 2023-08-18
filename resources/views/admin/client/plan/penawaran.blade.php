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
    <div class="hide-scrollbar overflow-x-hidden overflow-y-auto pt-28 h-screen md:pr-5 px-5 md:px-0">
    <form class="">
            <div class="">
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
                            <input id="perihal" type="text" class="mt-1 text-black rounded-md px-2 py-2 w-full bg-white" placeholder="Perihal">
                        </div>
                    
                        <div class=" block md:flex items-center gap-4">
                            <div class="w-full md:w-1/2 mb-4">
                                <label for="kepada" class="text-sm text-white">Kepada</label>
                                <input id="kepada" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Kepada">
                            </div>
                    
                            <div class="w-full md:w-1/4 mb-4">
                                <label for="tempat" class="text-sm text-white">Tempat</label>
                                <input id="tempat" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Bandung">
                            </div>
                    
                            <div class="w-full md:w-1/4 mb-4">
                                <label for="tanggal" class="text-sm text-white">Tanggal</label>
                                <input id="tanggal" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="03 Agustus 2023">
                            </div>
                        </div>
                    
                        <div class=" block md:flex items-center gap-4">
                            <div class=" w-full md:w-3/4">
                                <label for="ditawarkan" class="text-sm text-white">Hal yang Ditawarkan</label>
                                <input id="ditawarkan" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Hal yang Ditawarkan">
                            </div>

                            <div class=" w-full md:w-1/4 mt-2 md:mt-0">
                                <label for="jumlah" class="text-sm text-white">Jumlah Talent</label>
                                <input id="jumlah" type="text" class=" mt-1 text-black rounded-md px-2 py-2  w-full bg-white" placeholder="Jumlah">
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
                                    <input type="number" id="weekday" name="weekday" placeholder="Weekday Overtime" class=" text-black w-full p-2 outline-none rounded-tr-md rounded-br-md">
                                </div>
                            </div>
                            <div class=" w-full md:w-1/2 mt-2 md:mt-0">
                                <label for="Weekend" class="text-sm text-white">Weekend</label>
                                <div class=" mt-2 flex items-center gap-0">
                                    <label for="Weekend" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                                    <input type="number" id="Weekend" name="Weekend" placeholder="Weekend Overtime" class=" text-black w-full p-2 outline-none rounded-tr-md rounded-br-md">
                                </div>
                            </div>
                        </div>

                        <p class="mt-4">Biaya Dinas Luar Kota</p>

                        <div class=" block md:flex gap-4 mt-3 justify-between w-full">
                            <div class=" w-full md:w-1/2">
                                <label for="konsumsi" class="text-sm text-white">Konsumsi (perhari)</label>
                                <div class=" mt-2 flex items-center gap-0">
                                    <label for="konsumsi" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                                    <input type="number" id="konsumsi" name="konsumsi" placeholder="Konsumsi" class=" text-black w-full p-2 outline-none rounded-tr-md rounded-br-md">
                                </div>
                            </div>
                            <div class=" w-full md:w-1/2 mt-2 md:mt-0">
                                <label for="transport" class="text-sm text-white">Transport Pulang-Pergi Standar JKT-BDG</label>
                                <div class=" mt-2 flex items-center gap-0">
                                    <label for="transport" class=" bg-white p-2 rounded-tl-md rounded-bl-md text-black border-grey border-r-[1px] w-10">RP.</label>
                                    <input type="number" id="transport" name="transport" placeholder="Transport" class=" text-black w-full p-2 outline-none rounded-tr-md rounded-br-md">
                                </div>
                            </div>
                        </div>
                            
                            <div class="mt-4 flex justify-end">
                                <button type="submit" name="createWord" class=" w-full  md:w-[188px] bg-secondary text-white text-sm text-center h-[37px] rounded-md hover:scale-95 duration-200">Create</button>
                            </div>
                    </div>

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
                                <a href="/client/order/plan/training" class="bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center">
                                    <p class="hidden md:block">back</p>
                                    <i class="ri-arrow-left-line block md:hidden ml-1"></i>
                                </a>
                        </div>

                        </div>
                        
                        <div class="flex gap-4">
                            <div>
                                <button type="submit" name="save" class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">Save</button>
                            </div>
                
                            <div>
                            <div>
                                <a href="/client/order/plan/negosiasi" class="bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center">
                                    <p class="hidden md:block">Continue</p>
                                    <i class="ri-arrow-right-line block md:hidden ml-1"></i>
                                </a>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
            </div>
        </form>
    </dialog>

@endsection