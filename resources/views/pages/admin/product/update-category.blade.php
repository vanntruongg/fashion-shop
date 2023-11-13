@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Chỉnh sửa Loại sản phẩm')
@section('path', 'Chỉnh sửa / Loại Sản Phẩm')

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
    <div>
      <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Chỉnh sửa Loại Sản Phẩm</div>
      @if(session('create-success'))
          <div id="message" class="flex absolute top-12 right-7">
            <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
              <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                <span class="px-4">{{ session('create-success') }}</span>
              </div>
            </div>
          </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-8 border">
      <div class="col-span-2 p-4 w-2/3">
        <form action="" method="post">
          @csrf

          <div class="mt-4 ">
            <label
              for="LSP_Ten"
              class="text-slate-500 text-14"
            >
              Tên loại sản phẩm
            </label><br>
            <div class="border-[1.5px] mt-1">
              <input
                type="text"
                name="LSP_Ten"
                value ="{{$loaisanpham->LSP_Ten}}"
                class="pb-6 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
              >
            </div>
          </div>
          <div class="mt-4">
            <label
              for="DM_STT"
              class="text-slate-500 text-14 "
            >
            Danh mục 
            </label><br>
            <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
              <select
                name="DM_STT"
                class="py-2 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
              >
                  @foreach($danhmucsanpham as $danhmuc)
                    <option {{$loaisanpham->DM_STT === $danhmuc->DM_STT ? 'selected' : ''}}  value="{{ $danhmuc->DM_STT}}">{{ $danhmuc->DM_Ten}}</option>
                  @endforeach
                {{-- <option value=""></option> --}}
              </select>
            </div>
          <button
            type="submit"
            class="border-2 border-blue-500 p-2 px-6 mt-4 flex hover:bg-slate-100"
          >
            Cập Nhật
          </button>

        </form>
      </div>

    </div >
  </div>

@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection
