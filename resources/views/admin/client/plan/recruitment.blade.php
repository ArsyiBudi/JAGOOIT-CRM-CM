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
<div class="overflow-x-hidden overflow-y-auto pt-0 pb-10 h-[90vh] md:pr-5 px-5 md:px-0">
    <h1 class=" text-4xl">Recruitment</h1>
    <p class=" text-sm md:text-[16px] font-medium pt-3">Silakan pilih kandidat dengan jumlah melebihi yang dibutuhkan <br class=" hidden md:block"> untuk cadangan</p>

    <div class=" mt-5  w-full ">
        <ul class=" mx-auto steps steps-horizontal w-full ml-0 md:ml-14">
            <li class="step">
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
        <form action="{{ route('save_recruitment', ['order_id' => $order_id]) }}" method="POST">
            @csrf 

            <div class=" block md:flex justify-between">
                <div class=" relative w-full md:w-auto">
                    <input type="text" name="search" class=" bg-[#D9D9D9] outline-none rounded-md text-black py-1  px-8 w-full md:w-auto" placeholder="Search">
                    <i class="ri-search-line absolute top-1 left-2 text-black"></i>
                </div>
              
            </div>
        </form>
        <div class=" bg-darkSecondary w-full px-3 rounded-md mt-4 overflow-auto hide-scrollbar">
            <form action="{{ url(request() -> path()) }}" method="post">
                @csrf
                <div class="overflow-auto ">
                    <table class="table overflow-auto">
                        <!-- head -->
                        <thead>
                            <tr class="text-white">
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
                            @php
                            $count = ($talents -> currentPage() - 1) * $talents ->perPage() + 1;
                            @endphp
                            @foreach ($talents as $talent)
                            <tr>
                                <td>
                                    <label>
                                        <input name="talents_id[]" value="{{ $talent -> id }}" type="checkbox" class="checkbox border-white border-2" />
                                    </label>
                                </td>
                                <td align="center">{{ $count  }}</td>
                                @php
                                $count++;
                                @endphp
                                <td align="center">{{ $talent -> name }}</td>
                                <td align="center">{{ $talent -> pendidikanTalent -> description }}</td>
                                <td align="center">{{ $talent -> keterampilanTalent -> description }}</td>
                                <td align="center"> {{ $talent -> posisiTalent -> description }}</td>
                                <td align="center">
                                    <div class=" flex items-center gap-2">
                                        <a href="/client/plan/create/recruitment">
                                            <i class=" text-lg cursor-pointer ri-information-line"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="sticky bottom-0 pb-1 text-sm bg-darkSecondary flex items-center justify-center w-full">
                    {{ $talents -> links('vendor.pagination.custom-pagination') }}
                </div>
        </div>
        <div class="mt-2 flex justify-between items-center gap-1 md:gap-0">
            <div>
                <button type="submit" class=" bg-secondary text-white text-sm text-center py-1 px-3 md:px-14 rounded-md font-bold">
                    <p class=" hidden md:block">Save</p>
                    <i class="ri-save-3-line block md:hidden"></i>
                </button>
            </div>
            <div>
                <a href="{{ route('fetchTraining', ['order_id' => $order_id]) }}" class="bg-secondary text-white text-sm text-center py-1 px-2 md:px-14 rounded-md font-bold flex items-center">
                    <p class="hidden md:block">Continue</p>
                    <i class="ri-arrow-right-line block md:hidden ml-1"></i>
                </a>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    let selectedTalents = [];

    function selectTalent(id) {
        if (selectedTalents.includes(id)) {
            selectedTalents = selectedTalents.filter(item => item !== id);
        } else {
            selectedTalents.push(id);
        }
    }



</script>
@endsection