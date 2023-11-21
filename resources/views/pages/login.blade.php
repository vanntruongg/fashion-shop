<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-[#0069e9] from-30% to-violet-900 min-h-screen h-screen min-w-full ">
    <div class="logo pt-32">
        <a href="">
            <img src="" alt="" >
        </a>
    </div>
    <div class="container min-h-[30%] w-[30%] min-w-[20%] border bg-slate-50 rounded-lg px-2 py-4 m-auto">   
        <form action="{{route('login')}}" class="w-full flex justify-center items-center flex-col" method="POST">
            @csrf
            <h1 class="py-5 text-24 font-bold">Đăng Nhập</h1>
            <div class="mb-4 w-[60%] relative">
                <i class="fa-solid fa-user absolute ml-4 -translate-y-1/2 top-1/2"></i>
                <input type="text" name="username" class="w-full px-10 py-4 rounded-lg bg-slate-200">
                @if(session()->has('invalid-username'))
                    <span class="text-14 text-red-500">{{session()->get('invalid-username')}}</span>
                @endif
                
            </div>
            <div class="mb-4 w-[60%] relative">
                <i class="fa-solid fa-key absolute ml-4 -translate-y-1/2 top-1/2"></i>
                <input type="password" name="password" class="w-full px-10 py-4 rounded-lg bg-slate-200">
                @if(session()->has('incorrect-password'))
                    <span class="text-14 text-red-500">{{session()->get('incorrect-password')}}</span>
                @endif
                @if(session()->has('incorrect-password'))
                    <span class="text-14 text-red-500">{{session()->get('incorrect-password')}}</span>
                @endif
            </div>
            <button type="submit" class="mb-4 bg-gradient-to-r from-blue-600 from-40% to-cyan-500  min-w-[60%] px-10 py-4 rounded-lg hover:from-cyan-500  hover:to-blue-600 ">Đăng Nhập</button>
        </form>
        <div class="w-[60%] m-auto relative before:content-['-------'] before:absolute before:top1/2 after:content-['-------'] after:absolute after:top-0 after:right-0 ">
            <span class=" block text-center">hoặc đăng nhập với</span>
        </div>
        <div class="my-4">
            <button class="w-[60%] text-center mx-auto block bg-[#3b5998] px-10 py-4 rounded-lg">
                <span class="text-white font-bold">facebook</span>
            </button>
        </div>
        <div class="">
            <span class="block text-center">Bạn chưa có tài khoản?<a href="{{route('register')}}" class="text-blue-500">Đăng ký ngay.</a></span>
            <span class="block text-center"><a href="" class="text-blue-500">Bạn quên mật khẩu?</a></span>
        </div>
    </div>  
</body>
</html>