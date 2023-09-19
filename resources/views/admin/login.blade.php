<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JagooIT - Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="https://lh3.google.com/u/2/d/1QSOrEITHjSK8BU-H1EcEn2iQ1Cl2yWOh=w1919-h983-iv1" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="relative bg-primary text-white flex justify-center items-center h-screen font-quicksand p-5 md:p-0">

    <style>
.animate-slide-up {
    animation: slide-up 0.3s ease-in-out;
}

@keyframes slide-up {
    0% {
        transform: translateY(-10px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}
    </style>

    @if(session()->has('message'))
        <div class="alert alert-error absolute flex gap-4 top-10 w-auto animate-slide-up text-white font-medium border-2 border-red-500 cursor-pointer" onclick="closeAlert()">
            <span>{{ session('message') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
    @endif



    <div class=" w-full md:w-auto bg-grey border-2 border-white rounded-md py-8 px-5">

        <form action="{{ url('login') }}" method="POST">
            @csrf
            <h1 class=" text-center text-4xl font-bold">Sign in</h1>
            <div class="block w-52 mx-auto h-1 bg-white rounded-xl mt-3"></div>
            <div class="mt-5 md:mt-3">
                <p>Username</p>
                <input required type="text" name="username" class="outline-none text-black rounded-xl mt-2 bg-white p-2 w-full md:w-[400px] font-bold" autofocus value="{{ old('username') }}">
            </div>
            <div class="mt-3 relative">
                <p>Password</p>
                <input  id="passwordInput" type="password" name="password" class="outline-none text-black font-bold rounded-lg bg-white p-2 w-full md:w-[400px] mt-2" >
            <div id="eyeOpen" class="absolute top-10 right-3 cursor-pointer" onclick="showPass()">
                <i class="ri-eye-fill text-black text-opacity-70"></i>
            </div>
            <div id="eyeClose" class=" hidden absolute top-10 right-3 cursor-pointer" onclick="showPass()">
                <i class="ri-eye-off-fill text-black text-opacity-70"></i>
            </div>
            </div>
            <button type="submit" class="mt-5 bg-secondary py-1 px-9 font-bold mx-auto block rounded-lg hover:scale-95 duration-200">Login</button>
        </form>

    </div>


     <script>
        let show = false;

        const showPass = () => {     
            show = !show;            
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClose = document.getElementById('eyeClose');

            if (show) {
                eyeOpen.style.display = 'none';
                eyeClose.style.display = 'block';
            } else {
                eyeOpen.style.display = 'block';
                eyeClose.style.display = 'none';
            }

            const passwordInput = document.getElementById('passwordInput');
            passwordInput.type = show ? 'text' : 'password';
   
        }

        function closeAlert() {
    const alertContainer = document.querySelector('.alert');
    alertContainer.style.display = 'none';
}

    </script>
</body>
</html>
