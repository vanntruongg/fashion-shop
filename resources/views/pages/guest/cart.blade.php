@component('components.head', ['title' => 'Giỏ hàng'])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
  <div class="max-w-[960px] mx-auto">
    <h1 class="pb-6 text-18 font-serif font-semibold uppercase">Giỏ Hàng</h1>
    <div class="">
      <div class="grid grid-cols-12 pb-2 text-gray-500 text-14 font-medium border-b">
        <span class="col-span-6">Sản phẩm</span>
        <span class="col-span-2">Đơn giá</span>
        <span class="col-span-2">Số lượng</span>
        <span class="col-span-2">Thành tiền</span>
      </div>
      <div class="grid grid-cols-12 items-center py-4 border-b">
        <div class="col-span-6 flex items-center gap-4">
          <img src="https://photo.salekit.com/uploads/salekit_55212856015d5853d669eede2fe3d8d6/vest-5.jpg" alt="" class="w-24">
          <div class="flex flex-col items-start text-14">
            <span>Vest xanh đen kẻ sọc</span>
            <button class="text-blue-500 text-12 hover:underline">Xóa</button>
          </div>
        </div>
        <div class="col-span-2 font-semibold">2.890.000đ</div>
        <div class="col-span-2">Số lượng</div>
        <div class="col-span-2 font-semibold">2.890.000đ</div>
      </div>
      <div class="flex flex-col items-end gap-4 my-6">
        <p>Tổng tiền: <span class="font-bold">45.650.000đ</span></p>
        <a href="{{route('checkout')}}" class="text-primary-600 text-20 font-semibold uppercase px-8 py-2 border-2 border-primary-600 rounded-lg transition-all duration-500 hover:bg-primary-600 hover:text-white">Thanh toán</a>
      </div>
    </div>
  </div>
</main>

<x-footer :js-file="''" />
