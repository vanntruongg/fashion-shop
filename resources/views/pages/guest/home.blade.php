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
        @foreach ($jacket_category as $product)
            <x-cart-product :product="$product"/>
        @endforeach
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
        @foreach ($t_shirt_category as $product)
          <x-cart-product :product="$product"/>
        @endforeach
    </section>
    {{-- Jean - Denim --}}
    <section class="grid grid-cols-12 gap-4 my-10">
      <aside class="col-span-3 border h-full overflow-hidden">
        <h2 class="bg-primary-950 py-2 text-center text-20 text-white font-medium">Áo sơ mi nam</h2>
        <img src="/storage/images/banner/banner-3.jpg" alt="" class="w-full h-full">
      </aside>
      <div class="col-span-9 grid grid-cols-4 gap-4 mt-16">
        @foreach ($jean_category as $product)
          <x-cart-product :product="$product"/>
        @endforeach
    </section>
    <article class="my-10 grid grid-cols-3 gap-6">
      <img src="/storage/images/banner/footer1.jpg" alt="banner">
      <img src="/storage/images/banner/footer2.png" alt="banner">
      <img src="/storage/images/banner/footer3.jpg" alt="banner">
    </article>
  </main>

  <x-footer :js-file="'resources/js/guest/slider.js'" />
