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
    <div class="logo pt-32 flex justify-center mb-2">
        <a href="{{route('home')}}">
            <img class="w-40" src="/storage/image/salekit-logo12.png" alt="" >
        </a>
    </div>
    <div class="container min-h-[30%] w-[30%] min-w-[20%] border bg-slate-50 rounded-lg px-2 py-4 m-auto">   
        <form action="{{route('register')}}" class="w-full flex justify-center items-center flex-col" method="POST">
            {{-- @if($message)
                <h1 class="py-5 text-24 font-bold">{{$message}}</h1>
            @endif --}}
            @csrf
            <div class="mb-4 w-[70%] relative">
                <i class="fa-solid fa-user absolute ml-4 -translate-y-1/2 top-1/2"></i>
                <input type="text" name="name" class="w-full px-10 py-4 rounded-lg bg-slate-200 " placeholder="Họ và tên" value="{{old('name')}}">
                @error('name')
                    <span class="text-14 text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4 w-[70%] relative">
                <i class="fa-solid fa-envelope absolute ml-4 -translate-y-1/2 top-1/2"></i>
                <input type="email" name="email" class="w-full px-10 py-4 rounded-lg bg-slate-200" placeholder="Email" value="{{old('email')}}">
                @error('email')
                    <span class="text-14 text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4 w-[70%] relative">
                <i class="fa-solid fa-phone-flip absolute ml-4 -translate-y-1/2 top-1/2"></i>
                <input type="phone" name="phone" class="w-full px-10 py-4 rounded-lg bg-slate-200" placeholder="Số điện thoại" value="{{old('phone')}}">
                @error('phone')
                    <span class="text-14 text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4 w-[70%] relative">
                <i class="fa-solid fa-key absolute ml-4 -translate-y-1/2 top-1/2"></i>
                <input type="password" name="password" class="w-full px-10 py-4 rounded-lg bg-slate-200" placeholder="Mật khẩu" value="{{old('name')}}">
                @error('password')
                    <span class="text-14 text-red-500">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="mb-4 bg-red-500 min-w-[70%] px-10 py-4 rounded-lg text-18 font-bold text-white">Đăng Ký Ngay</button>
        </form>
        <div class="w-[70%] m-auto relative before:content-['-------'] before:absolute before:top1/2 after:content-['-------'] after:absolute after:top-0 after:right-0 ">
            <span class=" block text-center">hoặc đăng nhập với</span>
        </div>
        <div class="my-4">
            <button class="w-[70%] text-center mx-auto block bg-[#3b5998] px-10 py-4 rounded-lg">
               <span class="text-white font-bold">facebook</span>
            </button>
        </div>
        <div class="">
            <span class="block text-center">Bạn đã có tài khoản?<a href="{{route('login')}}" class="text-blue-500">Đăng nhập ngay.</a></span>
        </div>
    </div>  
</body>
</html>