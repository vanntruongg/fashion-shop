@component('components.head', ['title' => 'Thanh toán'])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
  <div class="grid grid-cols-2 gap-8">
    <div class="col-span-1">
      {{-- Infor --}}
      <form action="{{route('create-order')}}" method="post">
        @csrf
        <div class="flex items-center justify-between py-2 border-b">
          <h3 class="font-semibold uppercase">Thông tin liên hệ</h3>
          <div class="text-14">
            <span>Bạn đã có tài khoản?</span>
            <a href="/login" class="font-semibold hover:underline hover:text-blue-500">Đăng nhập</a>
          </div>
        </div>
        {{-- input infor --}}
        <input type="text" name="full_name" required placeholder="Họ và tên*" class="my-2 px-4 py-2 w-full text-14 border rounded-md shadow-sm focus-within:border-primary-500">
        <div class="flex gap-4">
          <input type="email" name="email" required placeholder="Email*" class="my-2 px-4 py-2 w-full text-14 border rounded-md shadow-sm focus-within:border-primary-500">
          <input type="number" name="phone" required placeholder="Số điện thoại*" class="my-2 px-4 py-2 w-full text-14 border rounded-md shadow-sm focus-within:border-primary-500">
        </div>
        
        {{-- Address --}}
        <div class="py-2 border-b">
          <h3 class="font-semibold uppercase">Địa chỉ nhận hàng</h3>
        </div>

        <input type="text" name="address" required placeholder="Địa chỉ*" class="my-2 px-4 py-2 w-full text-14 border rounded-md shadow-sm focus-within:border-primary-500" >

        <textarea type="text" name="note" placeholder="Ghi chú" class="my-2 px-4 py-2 w-full text-14 border outline-none rounded-md shadow-sm focus-within:border-primary-500"></textarea>

        {{-- submit order --}}
        <div class="flex items-center justify-between my-6">
          <a href="{{route('cart')}}" class="text-blue-500">Giỏ hàng</a>
          <button type="submit" class="bg-primary-500 text-white px-4 py-2 text-18 uppercase font-medium rounded-md transition-all duration-300 hover:bg-primary-700">Đặt Hàng</button>
        </div>
      </form>
    </div>

    {{-- product --}}
    <div class="col-span-1 bg-gray-100 p-2">
      <div class="flex items-center justify-between my-2 pb-2 border-b border-slate-300">
        <h3 class="font-semibold uppercase">Sản phẩm</h3>
      </div>
      @for ($i = 1; $i < 4; $i++)
        <div class="flex justify-between items-center py-2 my-2 border-b border-slate-300">
          <div class="flex items-center gap-4">
            <img src="https://photo.salekit.com/uploads/salekit_55212856015d5853d669eede2fe3d8d6/vest-5.jpg" alt="" class="w-20">
            <div class="flex flex-col items-start text-14 font-medium">
              <span>Vest xanh đen kẻ sọc</span>
            </div>
          </div>
          <div class="text-14 font-medium">1.490.000đ</div>
        </div>
      @endfor
      <div class="flex justify-end text-18 font-semibold ">
        <p>Tổng cộng:<span class="text-primary-500"> 9.660.000đ</span></p>
      </div>
    </div>
  </div>

</main>


<x-footer :js-file="''" />