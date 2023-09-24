@component('components.head', ['title' => 'Trang chủ'])
@endcomponent

  <main class="max-w-[1360px] mx-auto px-16 mt-[137px]">
    {{-- category & slider --}}
    <section class="grid grid-cols-12 gap-4 my-10 ">
      <aside class="col-span-3 border">
        <h2 class="bg-primary-950 py-2 text-center text-20 text-white font-medium">Danh Mục Sản Phẩm</h2>
        <ul class="mx-auto">
          <li class="">
            <a href="" class="block px-10 py-4 border-b hover:bg-gray-100 hover:text-primary-500">Áo Sơ Mi Nam</a>
          </li>
          <li class="">
            <a href="" class="block px-10 py-4 border-b hover:bg-gray-100 hover:text-primary-500">Áo Vest Nam</a>
          </li>
          <li class="">
            <a href="" class="block px-10 py-4 border-b hover:bg-gray-100 hover:text-primary-500">Quần Nam</a>
          </li>
        </ul>
      </aside>
      <div id="slider" class="col-span-9">
      </div>
    </section>
    {{-- jacket & vest --}}
    <section class="grid grid-cols-12 gap-4 my-10">
      <aside class="col-span-3 border h-full overflow-hidden">
        <h2 class="bg-primary-950 py-2 text-center text-20 text-white font-medium">Áo khoác - Vest</h2>
        <img src="/storage/images/banner/banner-3.jpg" alt="" class="w-full h-full">
      </aside>
      <div class="col-span-9 grid grid-cols-4 gap-4 mt-16">
        @for ($i = 1; $i <= 4; $i++)
        <div class="card flex flex-col cursor-pointer group">
          <img src="/storage/images/products/vest-{{$i}}.jpg" alt="product" class="h-full">
          <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
            <h4 class="text-center">Vest xanh đen kẻ sọc</h4>
            <div class="flex flex-col gap-1">
              <p class="text-center font-bold">2,890,000₫</p>
              <div class="flex justify-center"><button class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Thêm vào giỏ hàng</button></div>
            </div>
          </div>
        </div>
        @endfor
    </section>
    {{-- banner 1 --}}
    <article class="my-10">
      <img src="/storage/images/banner/banner-aonam.jpg" alt="">
    </article>
    {{-- T-shirt --}}
    <section class="grid grid-cols-12 gap-4 my-10">
      <aside class="col-span-3 border h-full overflow-hidden">
        <h2 class="bg-primary-950 py-2 text-center text-20 text-white font-medium">Áo sơ mi nam</h2>
        <img src="/storage/images/banner/banner-5.jpg" alt="" class="w-full h-full">
      </aside>
      <div class="col-span-9 grid grid-cols-4 gap-4 mt-16">
        @for ($i = 1; $i <= 4; $i++)
        <div class="card flex flex-col cursor-pointer group">
          <img src="/storage/images/products/vest-{{$i}}.jpg" alt="product" class="h-full">
          <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
            <h4 class="text-center">Vest xanh đen kẻ sọc</h4>
            <div class="flex flex-col gap-1">
              <p class="text-center font-bold">2,890,000₫</p>
              <div class="flex justify-center"><button class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Thêm vào giỏ hàng</button></div>
            </div>
          </div>
        </div>
        @endfor
    </section>
    {{-- Jean - Denim --}}
    <section class="grid grid-cols-12 gap-4 my-10">
      <aside class="col-span-3 border h-full overflow-hidden">
        <h2 class="bg-primary-950 py-2 text-center text-20 text-white font-medium">Áo sơ mi nam</h2>
        <img src="/storage/images/banner/banner-3.jpg" alt="" class="w-full h-full">
      </aside>
      <div class="col-span-9 grid grid-cols-4 gap-4 mt-16">
        @for ($i = 1; $i <= 4; $i++)
        <div class="card flex flex-col cursor-pointer group">
          <img src="/storage/images/products/vest-{{$i}}.jpg" alt="product" class="h-full">
          <div class="flex flex-col gap-4 p-2 pb-4 font-sans">
            <h4 class="text-center">Vest xanh đen kẻ sọc</h4>
            <div class="flex flex-col gap-1">
              <p class="text-center font-bold">2,890,000₫</p>
              <div class="flex justify-center"><button class="px-4 py-2 text-center text-14 border rounded-lg transition-all duration-300 hover:bg-primary-600 hover:text-white group-hover:bg-primary-600 group-hover:text-white">Thêm vào giỏ hàng</button></div>
            </div>
          </div>
        </div>
        @endfor
    </section>
    <article class="my-10 grid grid-cols-3 gap-6">
      <img src="/storage/images/banner/footer1.jpg" alt="banner">
      <img src="/storage/images/banner/footer2.png" alt="banner">
      <img src="/storage/images/banner/footer3.jpg" alt="banner">
    </article>
  </main>

@component('components.footer')
@endcomponent