@extends('admin.layouts.main')

@section('container')
<div class="pt-20 lg:pt-0">
</div>
<div class="overflow-auto pt-0 h-[90vh] w-full rounded-md hide-scrollbar">
    <div class="bg-darkSecondary flex flex-col px-8 py-10">
         <div class="flex flex-col text-lightGrey space-y-2">
            <div class=" flex justify-between">
                <div class="text-2xl">Edit Leads</div>
                <div class=" font-bold hover:scale-95 duration-200">
                    <button class=" bg-success bg-opacity-95  rounded-md py-1 px-5 ">Save</button>
                </div>
            </div>
            <div class="divide-y divide-slate-50 gap-4 flex flex-col">
                <div class="pt-3 flex items-center gap-2">
                    <p>
                       Nama Perusahaan :
                    </p>
                    <div>
                        <input type="text" class=" bg-transparent outline-none">
                    </div>
                </div>
                 <div class="pt-3 flex items-center gap-2">
                    <p>
                       Alamat : 
                    </p>
                    <div>
                        <input type="text" class=" bg-transparent outline-none">
                    </div>
                </div>
                <div class="pt-3 flex items-center gap-2">
                    <p>
                       Nama PIC :
                    </p>
                    <div>
                        <input type="text" class=" bg-transparent outline-none">
                    </div>
                </div>
                <div class="pt-3 flex items-center gap-2">
                    <p>
                        No Telepon PIC :
                    </p>
                    <div>
                        <input type="text" class=" bg-transparent outline-none">
                    </div>
                </div>
                <div class="pt-3 flex items-center justify-between">
                    <div class=" flex items-center gap-2">
                        <p>
                            Email :
                        </p>
                        <button class=" font-bold underline" onclick="my_modal_3.showModal()">Lihat Email</button>  
                    </div>  
                    <div class="" onclick="my_modal_3.showModal()">
                        <p class=" px-5 py-1 bg-success rounded-md font-bold text-2xl cursor-pointer hover:scale-95 duration-200">+</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box bg-primary">
            <form method="dialog" class=" flex items-center justify-end">
                <button class="">✕</button>
            </form>
             <div class=" hide-scrollbar w-full mt-5 max-h-96 overflow-auto">
                <table class=" w-full text-xs md:text-sm font-bold ">
                    <thead class="bg-darkSecondary sticky top-0">
                        <tr>
                            <td class=" p-2" align="center">No</td>
                            <td class=" p-2" align="center">Email</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class=" odd:bg-grey">
                            <td align="center" class=" p-4">1</td>
                            <td align="center" class=" p-4">Cumsbadag@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           <form action="" class=" my-3 w-full">
            <div class=" flex w-full " >
                <input autofocus required type="email" class=" bg-grey outline-none w-full py-1 px-2" placeholder="Tambah Email">
                <div>
                    <button type="submit" class=" bg-grey py-2 px-3 text-sm underline ">Save</button>
                </div>
            </div>
           </form>
        </div>
    </dialog>
</div>  
@endsection
