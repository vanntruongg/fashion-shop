@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Danh Sách Sản Phẩm')
@section('path', 'Sản phẩm / Sản Phẩm')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
    <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection
    <div class="w-full">

        <div class="w-[40%] pl-4  bg-white rounded-md focus-within:to-blue-300 -ml-3 my-4 ">
            {{-- <form action="{{ route('search-fish') }}" method="get" class="flex justify-between"> --}}
            <form action="{{route('search-product')}}" method="get" class="flex justify-between w-full ">
              @csrf
              <input type="text" placeholder="Tìm kiếm..." name="SP_Ten" class="focus:border-red-500 border px-2 py-2 rounded-md outline-none w-full bg-white " required>
              <button type="submit" class="inline-block mr-4 mt-2">
                <i class="fa-solid fa-magnifying-glass text-22 text-gray-500 relative -left-8 bottom-0.5"></i>
              </button>
            </form>
          </div>

      {{-- Table --}}

      <div class="flex flex-wrap -mx-3 mb-10 mt-4">
        <div class="flex flex-col w-full max-w-full px-3">
          <div class="flex flex-col min-w-[980px] mb-6 bg-white border-0 shadow-md rounded-lg ">
            @if($results->count() == 0)
              <h2 class="ml-2 my-4 text-20 font-sora">Không tìm thấy kết quả phù hợp cho "{{$SP_Ten}}"</h2>
            @else
            <div class="flex p-2 py-2 items-center justify-between">
              <h3 class="text-[#344767] text-20 font-sora">Kết quả tìm kiếm cho "{{ $SP_Ten }}"</h3>
            </div>
            @if(session('success'))
              <div id="message" class="backdrop-blur-2xl absolute top-2 left-[40%] rounded-lg border-l-8 border-l-blue-500 opacity-80">
                <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                  <span class="px-4">{{ session('success') }}</span>
                </div>
              </div>
            @endif
            <div class="flex-auto px-0 pt-0">
                <div class="p-0 overflow-x-auto place-self-auto">
                  <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                    <thead class="align-bottom bg-slate-200 rounded-2xl">
                      <tr class="text-black uppercase text-left text-12">
                        <th class="px-6 py-3 font-bold opacity">#</th>
                        <th class="px-4 py-3 font-bold ">Tên Sản Phẩm</th>
                        <th class="px-4 py-3 font-bold">Tên Loại Sản Phẩm</th>
                        <th class="px-4 py-3 font-bold">Giá Bán</th>
                        <th class="px-4 py-3 font-bold">Số lượng</th>
                        <th class="px-4 py-3 font-bold"></th>
                        {{-- <th class="px-4 py-3 font-bold "></th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($results as $key => $product)
                        <tr class="border-t even:bg-gray-100 odd:bg-white">
                          <td class="p-4 bg-transparent ">
                            <div class="px-2 py-1">
                                <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-4 bg-transparent text-left">
                            <div class=" py-1">
                                <h6 class="mb-0 text-sm leading-normal">{{$product->SP_Ten}}</h6>
                            </div>
                          </td>
                          <td class="p-4 bg-transparent">
                            <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal ">{{$product->LSP_Ten}}</h6>
                            </div>
                          </td>
                          <td class="p-4 bg-transparent">
                            <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal ">{{ number_format($product->SP_Gia, 0, ',', '.') }}đ</h6>
                            </div>
                          </td>
                          <td class="p-4 bg-transparent">
                            <div class="py-1">
                              <h6 class="mb-0 text-sm leading-normal ml-6">{{$product->CTSP_SoLuong}}</h6>
                            </div>
                          </td>
                        <td class="flex bg-transparent mt-4 justify-center items-center">
                          
                            {{-- <a href="fish/{{$fish->fish_id}}/edit" class="text-16 mr-2 text-blue-100"> --}}
                            <a href="{{route('update-product',['id' => $product->SP_Ma])}}" class="text-16 mr-2 text-blue-500">
                              <i class="fa-regular fa-pen-to-square mr-2"></i>
                            </a>
                            {{-- <button class="delete-fish text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$fish->fish_id}}"> --}}
                            <button class="delete-product text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$product->SP_Ma}}">
                              <i class="fa-regular fa-trash-can text-16"></i>
                            </button>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- phan trang --}}
                </div>
              </div>
          </div>

          @endif
        </div>
      </div>
    </div>


  </div>
@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection

                          