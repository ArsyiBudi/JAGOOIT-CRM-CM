<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JagooIT - Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-primary text-white flex justify-center items-center h-screen font-quicksand p-5 md:p-0">
    <div class=" w-full md:w-auto bg-grey border-2 border-white rounded-md py-8 px-5">
        <form action="">
            <h1 class=" text-center text-4xl font-bold">Sign in</h1>
            <div class="block w-52 mx-auto h-1 bg-white rounded-xl mt-3"></div>
            <div class="mt-5 md:mt-3">
                <p>Username</p>
                <input required type="text" class="outline-none text-black rounded-xl mt-2 bg-white p-2 w-full md:w-[400px] font-bold" >
            </div>
            <div class="mt-3 relative">
                <p>Password</p>
                <input  id="passwordInput" type="password" class="outline-none text-black font-bold rounded-lg bg-white p-2 w-full md:w-[400px] mt-2" >
            <div id="eyeOpen" class="absolute top-10 right-3 cursor-pointer" onclick="showPass()">
                <i class="ri-eye-fill text-black text-opacity-70"></i>
            </div>
            <div id="eyeClose" class=" hidden absolute top-10 right-3 cursor-pointer" onclick="showPass()">
                <i class="ri-eye-off-fill text-black text-opacity-70"></i>
            </div>
            </div>
            <a href="/login" class=" text-xs font-bold text-white text-opacity-50 ">
                <p class=" text-right my-5 md:my-3">Forgot your password?</p></a>
            <button type="submit" class="bg-secondary py-1 px-9 font-bold mx-auto block rounded-lg">Login</button>
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
    </script>
</body>
</html>
