@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Chi tiết đơn hàng')
@section('path', 'Đơn hàng / Chi tiết đơn hàng ')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection
    <div class="flex justify-between my-2 py-1 shadow-md text-gray-700 bg-primary-purple-5 bg-opacity-10 rounded-md select-none">
        <h1 class="flex items-center mx-2">Chi Tiết Đơn Hàng: </h1>
        <a href="{{route('admin-orders')}}" class="flex justify-center items-center mx-2 px-2 py-0.5 border rounded-lg">
          <i class="fa-solid fa-right-from-bracket"></i>
          <h3 class="mx-1">Trở lại</h3>
        </a>
      </div>
    
      <div class="grid grid-cols-2 gap-8 mt-4 leading-7">

        <div class="border p-2 rounded-xl shadow-xl">
          <div class="flex mb-1 select-none pointer-events-none">
            <img src="/storage/images/admin/info-order.png" alt="" class="w-8">
            <h1 class="py-1 mx-2 font-sora">Thông Tin Đơn Hàng</h1>
          </div>
          <p class="border-b"></p>
          <div class="flex flex-col mt-2 mx-2 text-14 font-mono">
            <div class="flex justify-between">
              <span>Mã: </span>
              <span class=" text-14">{{$hoadon->HD_Ma}}</span>
            </div>
            <div class="flex justify-between">
              <span>Ngày tạo: </span>
              <span class=" text-14">
                {{
                  date('Y-m-d', strtotime($hoadon->HD_Ngay)) == date('Y-m-d')
                  ? 'Hôm nay ' . date('H:i:s', strtotime($hoadon->HD_Ngay))
                  : $hoadon->HD_Ngay
                }}
              </span>
            </div>
            
          </div>
        </div>
  
        <div class="border p-2 rounded-xl shadow-xl">
          <div class="flex mb-1 select-none pointer-events-none">
            <img src="/storage/images/admin/info-customer.png" alt="" class="w-8 pointer-events-none select-none">
            <h1 class="py-1 mx-2 font-sora">Thông Tin Khách Hàng</h1>
          </div>
          <p class="border-b"></p>
          <div class="flex flex-col mt-2 mx-2 font-mono">
            <div class="flex justify-between text-14">
              <span class="text-14">Họ tên: </span>
              <span class=" text-14">{{ $hoadon->ND_Ho .' '. $hoadon->ND_Ten }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-14">Sđt: </span>
              <span class=" text-14">{{ $hoadon->ND_SDT }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-14">Địa chỉ:</span>
              <span class=" text-14">
                {{ $hoadon->ND_Diachi}}
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-10 mb-10">
        <div class="relative">
          <div class="flex flex-wrap">
            <div class="flex-auto pt-0  shadow-xl">
              <table class="items-center w-full mb-0 align-top border-b border-collapse text-slate-500">
                <thead class="align-bottom bg-slate-200 rounded-2xl">
                <tr class="text-black uppercase text-left text-12">
               
                  <th class="px-4 py-3 font-bold ">Ảnh</th>
                  <th class="px-4 py-3 font-bold">Tên sản phẩm</th>
                  <th class="px-4 py-3 font-bold">Số lượng</th>
                  <th class="px-4 py-3 font-bold">Đơn giá</th>
                  <th class="px-4 py-3 font-bold ">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productDetails as $product)
                  <tr class="border-t even:bg-gray-100 odd:bg-white">
                
                    <td class="px-4 py-3 bg-transparent text-left">
                      <div class="">
                        <img src="{{ $product->link_img }}" alt="" class="w-12">
                      </div>
                    </td>
                    <td class="px-4 py-3 bg-transparent">
                      <div class="">
                        <h6 class="mb-0 text-sm leading-normal">{{ $product->name}}</h6>
                      </div>
                    </td>
                    <td class="px-4 py-3 bg-transparent">
                      <div class="">
                        <h6 class="mb-0 text-sm leading-normal">{{ $product->CTHD_SoLuong }}</h6>
                      </div>
                    </td>
                    <td class="px-4 py-3 bg-transparent">
                      <div class="">
                        <h6 class="mb-0 text-sm leading-normal"> {{ number_format($product->CTHD_DonGia, 0, ',', '.') }}</h6>
                      </div>
                    </td>
                    <td class="px-4 py-3 bg-transparent">
                      <div class="">
                        <h6 class="mb-0 text-sm leading-normal">{{ number_format($product->CTHD_SoLuong * $product->CTHD_DonGia, 0, ',', '.') }}đ</h6>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
  
              <div class="flex justify-between items-center sticky bg-white bottom-0 w-full px-6 py-3 border shadow-sm">
                <div class="text-18">
                  Tổng cộng
                  <span class="text-primary-purple font-semibold">{{ count($productDetails) }}</span>
                  sản phẩm:
                  <span class="text-primary-purple font-semibold">{{ number_format($totalPrice, 0, ',', '.') }}đ </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
@section('footer')
  @include('pages.admin.layout.footer')
@endsection
