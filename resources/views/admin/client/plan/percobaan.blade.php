@extends('admin.layouts.main')

<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0.4em;
        /* Width of the scrollbar */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb {
        background-color: #555555;
        /* Color of the scrollbar thumb */
        border-radius: 8px;
        /* Rounded corners for the scrollbar thumb */
    }

    .hide-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #777777;
        /* Color of the scrollbar thumb on hover */
    }

    .hide-scrollbar::-webkit-scrollbar-track {
        background-color: #555555;
        /* Color of the scrollbar track */
    }

    .hide-scrollbar::-webkit-scrollbar-track:hover {
        background-color: #666666;
        /* Color of the scrollbar track on hover */
    }

    /* Customize the appearance of the scrollbar wheel */
    .hide-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #555555 #333333;
    }

    /* Customize the appearance of the scrollbar thumb icon */
    .hide-scrollbar::-webkit-scrollbar-thumb:vertical {
        background-color: #fff;
        /* Color of the scrollbar thumb icon */
    }

    .custom-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1);
        /* This inverts the icon color */
    }

</style>

@section('container')
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class=" overflow-y-auto overflow-x-hidden pt-0 pb-10 lg:pt-0 px-5 lg:px-10 h-[90vh]">
    <h1 class=" text-4xl">Masa Percobaan</h1>
    <p class=" text-[16px] font-medium pt-3">Silakan pilih kandidat</p>

    <div class=" mt-5  w-full ">
        <ul class="mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
            </li>
            <li class="step step-primary">
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
                    <input type="text" class=" bg-[#D9D9D9] outline-none rounded-md text-black py-1  px-8 w-full md:w-auto">
                    <i class="ri-search-line absolute top-1 left-2 text-black"></i>
                </div>
            </div>
            <div class=" bg-darkSecondary w-full px-3 rounded-md mt-4 overflow-auto hide-scrollbar">
                <div class="overflow-auto ">
                    <table class="table overflow-auto">
                        <!-- head -->
                        <thead>
                            <tr class=" text-white">
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox opacity-0 cursor-default" />
                                    </label>
                                </th>
                                <th align="center">No</th>
                                <th align="center">Nama Talent</th>
                                <th align="center">Pendidikan</th>
                                <th align="center">Keterampilan</th>
                                <th align="center">Posisi</th>
                                <th class=" pl-0  md:pl-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </th>
                                <td align="center">1</td>
                                <td align="center">Rustari Fuad</td>
                                <td align="center">Kurang Tahu</td>
                                <td align="center">Ngaji</td>
                                <td align="center"> <input type="text" name="" id="" class=" outline-none bg-white p-2 rounded-md w-20 text-black font-medium"></td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                        <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                    </div>
                                </td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </th>
                                <td align="center">1</td>
                                <td align="center">Rustari Fuad</td>
                                <td align="center">Kurang Tahu</td>
                                <td align="center">Ngaji</td>
                                <td align="center"> <input type="text" name="" id="" class=" outline-none bg-white p-2 rounded-md w-20 text-black font-medium"></td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                        <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                    </div>
                                </td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </th>
                                <td align="center">1</td>
                                <td align="center">Rustari Fuad</td>
                                <td align="center">Kurang Tahu</td>
                                <td align="center">Ngaji</td>
                                <td align="center"> <input type="text" name="" id="" class=" outline-none bg-white p-2 rounded-md w-20 text-black font-medium"></td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                        <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                    </div>
                                </td>
                            </tr>
                            <!-- row 4 -->
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </th>
                                <td align="center">1</td>
                                <td align="center">Rustari Fuad</td>
                                <td align="center">Kurang Tahu</td>
                                <td align="center">Ngaji</td>
                                <td align="center"> <input type="text" name="" id="" class=" outline-none bg-white p-2 rounded-md w-20 text-black font-medium"></td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                        <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </th>
                                <td align="center">1</td>
                                <td align="center">Rustari Fuad</td>
                                <td align="center">Kurang Tahu</td>
                                <td align="center">Ngaji</td>
                                <td align="center"> <input type="text" name="" id="" class=" outline-none bg-white p-2 rounded-md w-20 text-black font-medium"></td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                        <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </th>
                                <td align="center">1</td>
                                <td align="center">Rustari Fuad</td>
                                <td align="center">Kurang Tahu</td>
                                <td align="center">Ngaji</td>
                                <td align="center"> <input type="text" name="" id="" class=" outline-none bg-white p-2 rounded-md w-20 text-black font-medium"></td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                        <i class=" text-lg cursor-pointer ri-delete-bin-2-line text-delete"></i>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sticky bottom-0 pb-1 text-sm bg-darkSecondary flex items-center justify-center w-full">

                    <div class="flex gap-3 items-center">
                        <button class="bg-secondary hover:scale-95 duration-200 py-1 px-3 md:px-5 rounded-lg flex items-center justify-center my-5">Prev</button>
                        <div class="rounded-lg p-1 w-8 bg-grey flex items-center justify-center" onclick="{{ url('/client/detail') }}">
                            <p>1</p>
                        </div>
                        <div class="rounded-lg p-1 w-8 bg-grey flex items-center justify-center">
                            <p>10</p>
                        </div>
                        <button class="bg-secondary hover:scale-95 duration-200 py-1 px-3 md:px-5 rounded-lg flex items-center justify-center my-5">Next</button>
                    </div>
                </div>
            </div>
            <div class="mt-2 flex justify-between items-center gap-1 md:gap-0">
                <div>
                    <div>
                        <a href="{{ url('/client/order/plan/'.$order_id.'/negosiasi') }}" class="bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center hover:scale-95 duration-200">
                            <p class="hidden md:block">Back</p>
                            <i class="ri-arrow-left-line block md:hidden ml-1"></i>
                        </a>
                    </div>
        </form>

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
            <a href="{{ url('/client/order/plan/'.$order_id.'/popks') }}">
                <div class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                    <p class="hidden md:inline">Continue</p>
                    <i class="ri-arrow-right-line block md:hidden"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
</div>
@endsection
