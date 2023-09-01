@extends('admin.layouts.main')

<style>
    .hide-scrollbar::-webkit-scrollbar {
        width: 0em;
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

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

@section('container')
<div class="pt-20 pb-2 lg:pt-0">
</div>
<div class=" overflow-y-auto overflow-x-hidden pt-0 pb-10 lg:pt-0 px-5 md:px-10 h-[90vh]">
    <h1 class=" text-4xl">Training</h1>
    <p class=" text-sm md:text-[16px] font-medium pt-3">Silakan nilai kandidat</p>

    <div class=" mt-5  w-full ">
        <ul class=" mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <li class="step step-primary">
            </li>
            <li class="step ">
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
                    <input type="text" class=" bg-[#D9D9D9] outline-none rounded-md text-black py-1  px-8 w-full md:w-auto" placeholder="Search">
                    <i class="ri-search-line absolute top-1 left-2 text-black"></i>
                </div>
                <div class=" block md:flex gap-3 items-center w-full md:w-auto mt-3 md:mt-0">
                    <label for="endDate">End Date: </label> <br class=" block md:hidden">
                    <input type="date" id="endDate" class=" w-full mt-1 md:mt-0 md:w-auto custom-date-input rounded-md bg-primary py-2 px-5 text-white outline-none border-[1px] border-white">
                </div>
            </div>

            <div class=" bg-darksecondary w-full px-3 rounded-md mt-4 overflow-auto hide-scrollbar">
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
                                @foreach($datas as $data)
                                    @if($data -> talentData)
                                    @foreach($data -> talentDataFetch as $row)
                                        <tr>
                                            <th align="center">{{ isset($i) ? ++$i : $i = 1  }}</th>
                                            <td align="center">{{ $row -> talentData -> name}}</td>
                                            <td align="center">
                                                <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                    <input id='pre-test' name='pre-test' type="number" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                    <input id='post-test' name='post-test' type="number" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                    <input id='nilai-kelompok' name='nilai-kelompok' type="number" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                                </div>
                                            </td align="center">
                                            <td align="center">
                                                <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                    <input id='nilai-akhir' name='nilai-akhir' type="number" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="w-[86px] h-[27px] rounded-md bg-white flex items-center justify-center">
                                                    <input id='rata-rata' name='rata-rata' type="number" class='text-black w-full text-center outline-none bg-transparent' placeholder='nilai'>
                                                </div>
                                            </td>
                                            <td align="center"><input type="submit" class="bg-secondary text-white rounded-md w-[82px] h-[25px]"></td>
                                        </tr>
                                    @endforeach
                                    @else
                                        No Talent Data
                                    @endif
                                @endforeach
                            </div>
                        </tbody>
                    </table>
                </div>
                <div class="sticky bottom-0 pb-1 text-sm bg-darkSecondary flex items-center justify-center w-full">
                    {{ $datas -> links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
        </form>

        <div class="mt-2 flex justify-between items-center gap-1 md:gap-0">
            <div>
                <div>
                    <a href="{{ redirect() -> back() }}" class="bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center hover:scale-95 duration-200">
                        <p class="hidden md:block">Back</p>
                        <i class="ri-arrow-left-line block md:hidden ml-1"></i>
                    </a>
                </div>

            </div>
            <div class="flex gap-4 max-sm:w-full max-sm:justify-between">
                <div></div>
                <div>
                    <form action="{{ url(request() -> path()) }}" method="POST">
                        @csrf
                        <button type="submit" name="save" class=" w-full bg-secondary text-white text-sm text-center py-1 px-14 rounded-md font-bold hover:scale-95 duration-200">
                            <p class="hidden md:block">Save</p>
                            <i class="ri-save-line block md:hidden"></i>
                        </button>
                    </form>
                </div>

                <div>
                @foreach($datas as $data)
                    @if($data -> offer_letter_id)
                        <form method="get" action="{{ route('open_offer', ['order_id' => $data -> id]) }}">
                            <button>
                                <div class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold hover:scale-95 duration-200">
                                    <p class="hidden md:inline">Continue</p>
                                    <i class="ri-arrow-right-line block md:hidden"></i>
                                </div>
                            </button>
                        </form>
                    @endif
                @endforeach                
                </div>
            </div>
        </div>

    </div>
</div>
@endsection