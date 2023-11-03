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
      
      @foreach ($products as $product)
        <div class="grid grid-cols-12 items-center py-4 border-b">
          <div class="col-span-6 flex items-center gap-4">
            <img src={{$product->SP_HinhAnh}} alt="" class="w-24">
            <div class="flex flex-col items-start text-14">
              <span>{{$product->SP_Ten}}</span>
              <a 
              href="{{ route('products.delete', ['id' => $product->SP_Ma]) }}" class="text-blue-500 text-12 hover:underline">Xóa</a>
            </div>
          </div>
          <div class="col-span-2 font-semibold">{{number_format($product->SP_Gia, 0, ',', '.')}}đ</div>
          <div class="col-span-2 flex items-center">
            <button 
              class="decrease flex items-center px-[6px] py-[5px] border rounded-full group" 
              data-product-id="{{ $product->SP_Ma }}"
            >
              <i class="fa fa-minus text-12 font-bold group-active:scale-125"></i>
            </button>
            <span class="quantity px-4">{{$product->CTGH_SoLuong}}</span>
            <button 
              class="increase flex items-center px-[6px] py-[5px] border rounded-full group"
              data-product-id="{{ $product->SP_Ma }}"
            >
              <i class="fa fa-plus text-12 font-black group-active:scale-125"></i>
            </button>
          </div>
          <div class="price col-span-2 font-semibold" data-product-price="{{ $product->SP_Gia * $product->CTGH_SoLuong}}">{{number_format($product->SP_Gia * $product->CTGH_SoLuong, 0, ',', '.')}}đ</div>
        </div>
      @endforeach
      <div class="flex flex-col items-end gap-4 my-6">
        <p>Tổng tiền: <span class="totalPrice font-bold">45.650.000đ</span></p>
        <a href="{{route('checkout')}}" class="text-primary-600 text-20 font-semibold uppercase px-8 py-2 border-2 border-primary-600 rounded-lg transition-all duration-500 hover:bg-primary-600 hover:text-white">Thanh toán</a>
      </div>
    </div>
  </div>
</main>

<script>
  var products = @json($products);
</script>

<x-footer :js-file="'resources/js/guest/cart.js'" />
