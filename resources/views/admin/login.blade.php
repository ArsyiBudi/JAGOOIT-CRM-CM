<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JagooIT - Login</title>
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-primary text-white flex justify-center items-center h-screen font-quicksand p-5 md:p-0">
    <div class=" w-full md:w-auto bg-grey border-2 border-white rounded-md py-8 px-5">
        <form action="">
            <h1 class=" text-center text-4xl font-bold">Sign in</h1>
            <div class="block w-52 mx-auto h-1 bg-white rounded-xl mt-3"></div>
            <div class="mt-5 md:mt-3">
                <p>Username</p>
                <input type="text" class="outline-none text-black rounded-xl mt-2 bg-white p-2 w-full md:w-[400px] font-bold" >
            </div>
            <div class="mt-3">
                <p>Password</p>
                <input type="password" class="outline-none text-black rounded-lg bg-white p-2 w-full md:w-[400px] mt-2" >
            </div>
            <a href="/login" class=" text-xs font-bold text-white text-opacity-50 ">
                <p class=" text-right my-5 md:my-3">Forgot your password?</p></a>
            <button type="submit" class="bg-secondary py-1 px-9 font-bold mx-auto block rounded-lg">Login</button>
        </form>
    </div>
</body>
</html>
