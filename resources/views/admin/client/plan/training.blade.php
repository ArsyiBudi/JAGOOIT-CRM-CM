@extends('admin.layouts.main')

<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0em; /* Width of the scrollbar */
    }
    
    .hide-scrollbar::-webkit-scrollbar-thumb {
        background-color: #555555; /* Color of the scrollbar thumb */
        border-radius: 8px; /* Rounded corners for the scrollbar thumb */
    }
    
    .hide-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #777777; /* Color of the scrollbar thumb on hover */
    }
    
    .hide-scrollbar::-webkit-scrollbar-track {
        background-color: #555555; /* Color of the scrollbar track */
    }
    
    .hide-scrollbar::-webkit-scrollbar-track:hover {
        background-color: #666666; /* Color of the scrollbar track on hover */
    }
    
    /* Customize the appearance of the scrollbar wheel */
    .hide-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #555555 #333333;
    }
    
    /* Customize the appearance of the scrollbar thumb icon */
    .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
        background-color: #fff; /* Color of the scrollbar thumb icon */
    }
    
    .custom-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1); /* This inverts the icon color */
    }
    </style>

@section('container')
<div class=" overflow-y-auto overflow-x-hidden pt-28 md:pt-0 px-5 md:px-10 h-screen">
    <h1 class=" text-4xl">Training</h1>
    <p class=" text-sm md:text-[16px] font-medium pt-3">Silakan nilai kandidat</p>

    <div class=" mt-5  w-full ">
        <ul class=" mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <li  class="step step-primary">
            </li>
            <li  class="step ">
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
        <form action="">
            <div class=" block md:flex justify-between">
                <div class=" relative w-full md:w-auto">
                    <input type="text"  class=" bg-[#D9D9D9] outline-none rounded-md text-black py-1  px-8 w-full md:w-auto" placeholder="Search">
                    <i class="ri-search-line absolute top-1 left-2 text-black"></i>
                </div>
                <div class=" block md:flex gap-3 items-center w-full md:w-auto mt-3 md:mt-0">
                    <label for="endDate">End Date: </label> <br class=" block md:hidden">
                    <input type="date" id="endDate" class=" w-full mt-1 md:mt-0 md:w-auto custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                </div>
            </div>
            <div class=" bg-grey w-full p-3 rounded-md mt-4 overflow-auto h-72 hide-scrollbar">
                <div class="overflow-auto ">
                    <table class="table overflow-auto">
                        <!-- head -->
                        <thead>
                            <tr class=" text-white">
                                <th align="center">No</th>
                                <th align="center">Nama Talent</th>
                                <th align="center">Pre-Test</th>
                                <th align="center">Pre-Test</th>
                                <th align="center">Kelompok</th>
                                <th align="center">Akhir</th>
                                <th align="center">Rata-Rata</th>
                                <th align="center">Aksi</th>
                            </tr>
                        </thead>
                            <tbody>
                                <div>
                                <!-- row 1 -->
                                    <tr>
                                        <th align="center">1</th>
                                        <td align="center">Bambang S.</td>
                                        <td align="center">
                                            <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center"> 
                                                <input id='pre-test' name='pre-test' type="text" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai' >
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                <input id='post-test' name='post-test' type="text" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                <input id='nilai-kelompok' name='nilai-kelompok' type="text" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                            </div>
                                        </td align="center">
                                        <td align="center">
                                            <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                <input id='nilai-akhir' name='nilai-akhir' type="text" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                            </div>
                                        </td>
                                        <td align="center">
                                            <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                <input id='rata-rata' name='rata-rata' type="text" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                            </div>
                                        </td>
                                        <td align="center"><input type="submit" class="bg-secondary text-white rounded-md w-[82px] h-[25px]"></td>
                                    </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class=" flex justify-between items-center gap-1 md:gap-0">
                <div>
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold">
                      <p class=" hidden md:block">Back</p>
                      <i class="ri-arrow-left-line block md:hidden"></i>  
                    </button>
                </div>
                <div class=" flex items-center gap-3">
                    <div class="">
                        <button class=" bg-secondary py-1 px-3 md:px-5 rounded-md cursor-pointer hover:scale-95 my-5">Prev</button>
                    </div>
                    <div class=" bg-grey p-1 rounded-md w-8 text-center">
                        <p>1</p>
                    </div>
                    <div class=" bg-grey p-1 rounded-md w-8 text-center">
                        <p>10</p>
                    </div>
                    <div class="">
                        <button class="  bg-secondary py-1 px-3 md:px-5 rounded-md cursor-pointer hover:scale-95 my-5">Next</button>
                    </div>
                    
                </div>
                <div class="flex gap-1">
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold">
                        <p class=" hidden md:block">Save</p>
                        <i class="ri-save-3-line block md:hidden"></i>  
                      </button>
                    <button class=" bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold">
                        <p class=" hidden md:block">Continue</p>
                        <i class="ri-arrow-right-s-line block md:hidden"></i>
                    </button>
                </div>
            </div>
        </form> 
     </div>
</div>     
@endsection












