@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Thêm người dùng mới')
@section('path', 'Người dùng / Thêm người dùng mới')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection
    @if(session('add-success') || session('update-success') || session('delete-success'))
    <div id="message" class="flex absolute top-12 right-7">
      <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
        <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
        </div>
      </div>
    </div>
    @endif

    
    <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Tạo mới người dùng</div>
    @if(session('add-failed'))
        <div id="message" class="bg-slate-200 absolute top-12 right-7 rounded-lg border-l-8 border-l-blue-500 opacity-80">
          <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
            <span class="px-4">{{ session('add-failed') }}</span>
          </div>
        </div>
      @endif
    @if ($errors->any())
    <div class="alert alert-danger text-red-500 mb-1">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="border p-4">
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center justify-between mt-1 mb-6">
          <div class="flex items-center">
            <div class="w-28 h-28 mr-10">
              
              <img
                id="img-preview"
                src="{{ URL::to('/storage/images/admin/user_default.png')}}"
                alt="ND_avt"
                class="w-full h-full rounded-full ml-3"
              >
                
            </div>

            <div class="px-4 py-2 border-2 rounded-full hover:bg-blue-100 hover:text-white transition-all duration-300 cursor-pointer">
              <label for="input-file-img" class="cursor-pointer inline-block rounded-lg">
                Chọn ảnh
              </label>
            </div>
            <input
              id="input-file-img"
              type="file"
              name="ND_avt"
              hidden
              class="py-8 text-14 border border-slate-500 file:ml-2 rounded-lg border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
            >
          </div>

          <div class="mr-20 flex flex-col font-extralight text-slate-500 uppercase">
            <div class="mb-1">
              <input
                type="radio"
                name="ND_VT"
                id="customer"
                value="2"
                class="h-4 w-4 cursor-pointer peer/customer"
                checked
              >
              <label for="customer" class="peer-checked/customer:text-blue-200">Khách Hàng</label>
            </div>
            <div class="">
              <input
                type="radio"
                name="ND_VT"
                id="admin"
                value="1"
                class="h-4 w-4 cursor-pointer peer/admin"
              >
              <label for="admin" class="peer-checked/admin:text-blue-200">Quản Trị Viên</label>
            </div>

          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div class="">
            <label
              for="ND_Ho"
              class="text-slate-500 text-14"
            >
              Họ
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
              <i class="fa-regular fa-user px-2"></i>
              <input
                type="text"
                name="ND_Ho"
                placeholder="Vd: Nguyễn Văn"
                class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
              >
            </div>
          </div>

          <div class="">
            <label
              for="ND_Ten"
              class="text-slate-500 text-14"
            >
              Tên
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
              <i class="fa-regular fa-user px-2 group"></i>
              <input
                type="text"
                name="ND_Ten"
                placeholder="Vd: A"
                class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
              >
            </div>
          </div>

          <div class="">
            <label
              for="ND_SDT"
              class="text-slate-500 text-14"
            >
              Số điện thoại
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
              <i class="fa-solid fa-mobile-screen px-2"></i>
              <input
                type="number"
                name="ND_SDT"
                placeholder="(012) 345-6789"
                class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
              >
            </div>
          </div>

          <div class="">
            <label
              for="email"
              class="text-slate-500 text-14"
            >
              Email
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
              <i class="fa-regular fa-envelope px-2"></i>
              <input
                type="email"
                name="email"
                placeholder="Email address"
                class="py-1.5 w-full outline-none rounded-lg placeholder:text-14 text-14"
              >
            </div>
          </div>
        </div>

        <div class="mt-4 ">
          <label
            for="ND_Diachi"
            class="text-slate-500 text-14"
          >
            Địa chỉ
          </label><br>
          <div class="border-[1.5px] mt-1">
            <input
              type="text"
              name="ND_Diachi"
              placeholder="Address"
              class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
            >
          </div>
        </div>

        <div class="my-4">
          <label
            for="password"
            class="text-slate-500 text-14"
          >
            Mật khẩu
          </label><br>
          <div class="border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
            <input
              type="password"
              name="password"
              placeholder="Password"
              class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
            >
          </div>
        </div>

        <button
          type="submit"
          class="border-2 border-blue-500 p-2 px-6 mt-4 flex hover:bg-slate-100"
        >
          Thêm
        </button>

      </form>
    </div>
  </div>

@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection
