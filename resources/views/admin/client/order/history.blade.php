@extends('admin.layouts.main')

@section('container')
    <div class="w-full bg-darkSecondary pt-5 pb-16 px-7 flex  flex-col">

        <div class="border-b border-white w-full pb-3 mb-3">
            <h3 class="text-white font-semibold text-3xl">History Order</h3>
        </div>



        <div class="flex items-center justify-between mt-3 mb-12">
            <div class="flex gap-3 items-center">
                <p class="text-white text-sm">Show</p>
                <form class="flex items-center bg-grey rounded-xl justify-center py-1 w-[60px] px-1">
                    <input type="text" class=" text-white w-full text-center bg-transparent outline-none">

                </form>
                <p class="text-white text-sm">entries</p>

            </div>
            <div class="flex gap-3 items-center">
                <p class="text-white text-sm">Search</p>
                <form class="bg-white rounded-xl py-1 px-1 w-[320px]">
                    <input type="text" class="text-black bg-transparent outline-none w-full">
                </form>
            </div>
        </div>

        <table class="mb-12">
            <thead class="border-b border-white ">
                <tr class=" pb-4">
                    <th class="pb-4 font-bold">No</th>
                    <th class="pb-4 font-bold">Order ID</th>
                    <th class="pb-4 font-bold">Nama Perusahaan</th>
                    <th class="pb-4 font-bold">Due Date </th>
                    <th class="pb-4 font-bold">Status</th>
                    <th class="pb-4 font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="mt-4">
                <tr class="text-center bg-grey mt-4">
                    <td class="py-4 font-medium">1</td>
                    <td class="py-4 font-medium">12131</td>
                    <td class="py-4 font-medium">PT. Fuad Military</td>
                    <td class="py-4 font-medium">7 Agustus 2023</td>
                    <td class="py-4 font-medium">Selesai</td>
                    <td class="py-4 font-medium">
                        <i class="ri-calendar-todo-fill text-2xl"></i>
                        <a href="{{ url('/client/order/history/detail')}}"><i class="ri-information-line text-2xl"></i></a>
                        <i class="ri-delete-bin-2-line text-2xl text-red-600"></i>
                    </td>
            </tbody>
        </table>

        <div class="flex items-center justify-center w-full">

            <div class="flex gap-3 items-center">
                <button class="bg-secondary w-[69px] rounded-lg flex items-center justify-center py-2">Prev</button>
                <div class="rounded-lg p-2 w-[32px] bg-grey flex items-center justify-center">
                    <p>1</p>
                </div>
                <div class="rounded-lg p-2 w-[32px] bg-grey flex items-center justify-center">
                    <p>10</p>
                </div>
                <button class="bg-secondary rounded-lg w-[69px] flex items-center justify-center py-2">Next</button>
            </div>
        </div>
        
    </div>
@endsection