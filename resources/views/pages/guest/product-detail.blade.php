@component('components.head', ['title' => 'Trang chủ'])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 mt-[137px]">
  <form action="{{route('cart.add')}}" method="post">
    @csrf
    <div class="py-20 flex gap-8">
      <input type="hidden" name="product_id" value={{ $product->SP_Ma }}>
      <div class="">
        <img src={{$product->SP_HinhAnh}} alt="product-detail" class="">
      </div>
      <div class="w-full">
        <div class="flex flex-col gap-2 mb-4 border-b">
          <h3 class="text-28 font-serif font-bold">{{$product->SP_Ten}}</h3>
          <span class="pb-4 text-22 text-primary-600 font-medium">{{number_format($product->SP_Gia, 0, ',', '.')}}đ </span>
        </div>
        <div class="flex flex-col gap-4">
          <div class="w-[120px] flex items-center justify-between border border-slate-300 rounded-sm">
            <span id="btn_decrease" class="w-full py-1 text-center border-r border-slate-300 cursor-pointer group">
              <i class="fa-solid fa-minus group-active:scale-125"></i>
            </span>
            <input id="quantity" type="number" name="quantity" class="w-full text-20 text-center">
            <span id="btn_increase" class="w-full py-1 text-center border-l border-slate-300 cursor-pointer group">
              <i class="fa-solid fa-plus group-active:scale-125"></i>
            </span>
          </div>
          <div class="flex gap-4">
            <button 
              type="submit"
              name="action"
              value="add" 
              class="bg-primary-500 text-gray-200 px-4 py-2 border rounded-md transition-all duration-300 hover:bg-primary-800"
            >
              <i class="fa-solid fa-cart-plus"></i>
              <span>Thêm vào giỏ hàng</span>
            </button>
            <button 
              type="submit"
              name="action"
              value="add_and_checkout"
              class="text-gray-700 px-4 py-2 border border-primary-600 rounded-md transition-all duration-300"
            >
              <i class="fa-solid fa-cart-shopping"></i>
              <span>Mua ngay</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>

<x-footer :js-file="'resources/js/guest/product-detail.js'" />