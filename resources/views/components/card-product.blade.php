<div class="card flex flex-col cursor-pointer group">
  <a href="{{ route('products.detail', ['id' => $product->SP_Ma]) }}" class="h-full">
    <img src={{$product->SP_HinhAnh}} alt="product" class="h-full">
  </a>
  <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
    <a href="/products/name">
      <h4 class="text-center">{{$product->SP_Ten}}</h4>
    </a>
    <div class="flex flex-col gap-1">
        <p class="text-center font-bold">{{number_format($product->SP_Gia, 0,  ',', '.')}}₫</p>
        <div class="flex justify-center"><a href="{{ route('products.detail', ['id' => $product->SP_Ma]) }}" class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Xem chi tiết</a></div>
    </div>
  </div>
</div>