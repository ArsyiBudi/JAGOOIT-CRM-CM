<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JagooIT | Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class=" bg-primary w-screen h-screen font-quicksand relative">

<div class="navbar fixed top-0">
  <div class="flex-1">
    <div class=" bg-[#D9D9D9] py-1 px-4 rounded-lg">
        <a href="/">
        <img src="img/logo.png" alt="" class=" w-20 md:w-32">
        </a>
    </div>
  </div>
  <div class="flex-none text-white">
    <ul class="menu menu-horizontal px-1 text-sm font-semibold">
      <li><a href="/" class=" hover:text-white hover:text-opacity-80">Home</a></li>
      <li><a href="/login" class=" border-secondary text-secondary border-[1px] rounded-xl hover:bg-secondary hover:text-white hover:text-opacity-80">Login</a></li>
    </ul>
  </div>
</div>  

<div class=" flex justify-center items-center h-screen">
  <div class=" text-white block mx-auto w-full p-5">
    <h1 class=" text-2xl md:text-4xl font-semibold text-center">Tracking Your Order</h1>
    <div class=" border-2 border-white rounded-md w-full md:w-96 mt-3 block mx-auto"></div>
    <div class=" bg-grey mt-5 rounded-lg py-8 px-5 w-full md:w-[500px] mx-auto">
        <form action="{{ url('track') }}" method="POST">
          @csrf
            <h1 class=" text-center text-lg font-bold">Masukan Order ID</h1>
            <input type="text" name="order_id" id="" class=" my-5 w-full rounded-xl p-2 outline-none text-black bg-white font-semibold">
            <p class=" text-white bg-delete p-1 rounded-md text-center text-xs font-bold">Tidak ada order dengan ID : id nya... </p>
            <div class=" mt-5 hover:scale-95 duration-200">
                <button type="submit" class=" bg-secondary py-1 px-8 rounded-lg font-bold block mx-auto">Cek </button>
            </div>      
        </form>
    </div>
</div>
</div>
</body>
</html>