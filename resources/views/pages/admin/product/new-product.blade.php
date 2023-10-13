@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Create new Fish')
@section('path', 'Thêm mới / Sản Phẩm')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection

    <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Thêm Sản Phẩm Mới</div>
    <div class="">
      <div class="col-span-3 border p-4">
        <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="flex items-center justify-between mt-1 mb-6">
            <div class="w-80 h-32 mr-10">
              {{-- <img
                src="{{ URL::to('/images/admin/vtd.png')}}"
                alt="avatar"
                class="w-full h-full rounded-full"
              > --}}
              {{-- <img
                id="img-preview"
                src=""
                alt="image-product"
                class="w-full h-full"
              > --}}
              <i class="fa-solid fa-shirt text-8xl ml-14 mt-3"></i>
            </div>

            <input
              id="input-file-img"
              type="file"
              name="fish-img"
              placeholder=""
              class="w-full py-8 text-14 border border-slate-500 file:ml-2 rounded-lg border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
            >
          </div>


          <div class="grid grid-cols-3 gap-4">
            <div class="">
              <label
                for="LSP"
                class="text-slate-500 text-14"
              >
              Loại Sản Phẩm
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <select
                  name="LSP"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                >
                    @foreach($loaisanpham as $loaisp)
                    <option value="{{ $loaisp->LSP_Ten }}">{{ $loaisp->LSP_Ten }}</option>
                    @endforeach
                  {{-- <option value=""></option> --}}
                </select>
              </div>
            </div>

            <div class="">
              <label
                for="SP_Ma"
                class="text-slate-500 text-14"
              >
                Mã sản phẩm
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <input
                  type="text"
                  name="SP_Ma"
                  placeholder="Nhập mã"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                >
              </div>
            </div>


            <div class="">
              <label
                for="SP_Ten"
                class="text-slate-500 text-14"
              >
                Tên
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <input
                  type="text"
                  name="SP_Ten"
                  placeholder="Nhập tên"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                >
              </div>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-4 mt-4">
            <div class="">
              <label
                for="MS_Ma"
                class="text-slate-500 text-14"
              >
                Màu Sắc
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <select
                  name="MS_Ma"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                >
                  @foreach($mausac as $value)
                    <option value="{{ $value->MS_TenMau }}">{{ $value->MS_TenMau }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="">
              <label
                for="KT_Ma"
                class="text-slate-500 text-14"
              >
                Kích Thước
              </label><br>
              <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                <select
                  name="KT_Ma"
                  class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                >
                  @foreach($kichthuoc as $value)
                    <option value="{{ $value->KT_Ten }}">{{ $value->KT_Ten }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="">
                <label
                  for="SP_Gia"
                  class="text-slate-500 text-14"
                >
                  Giá Bán
                </label><br>
                <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                  <input
                    type="text"
                    name="SP_Gia"
                    placeholder="Nhập giá"
                    class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                  >
                </div>
            </div>


          </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="mt-4 ">
              <label
                for="habit"
                class="text-slate-500 text-14"
              >
                Số lượng
              </label><br>
              <div class="border-[1.5px] mt-1">
                <input
                  type="text"
                  name="quantity"
                  placeholder="Nhập"
                  class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14"
                >
              </div>
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

    </div >
  </div>

@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection
