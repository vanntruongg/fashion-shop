<header class="max-w-[1360px] mx-auto flex items-center justify-between gap-8 text-14 px-16 py-3">
    {{-- Logo --}}
    <div class="">
      <img src="" alt="">
      <h2 class="text-32 font-pacifico text-primary-500"><a href={{ route('home') }}>FashionShop</a></h2>
    </div>
    {{-- Search --}}
    <div class="flex-auto border-[1.5px] border-slate-300 rounded-full relative transition-all duration-100 focus-within:border-primary-600">
      <form action="/search" method="GET">
        <input name="key" type="text" placeholder="Nhập từ khóa tìm kiếm..." required class="w-full px-4 p-2 rounded-full">
        <button class="bg-gray-300 text-gray-500 h-[90%] my-0.5 px-6 absolute right-0.5 rounded-full">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <div class="flex-1"></div>
  {{-- Login & Cart --}}
  <div class="flex items-center gap-8 text-gray-600">
    {{-- Cart --}}
    <a href="/cart" class="relative">
      <i class="fa-solid fa-cart-shopping"></i>
      <span class="bg-red-500 text-white text-12 font-medium flex items-center justify-center absolute -top-2 -right-2 w-4 h-4 rounded-full">3</span>
    </a>
    {{-- Login --}}
    <a href="/login" class="px-3 py-2 font-medium uppercase transition-all duration-300 hover:bg-gray-100 relative group">
      <span class="">Đăng nhập</span>
      <span class="absolute top-0 left-0 w-[50%] h-0.5 bg-primary-300 transition-all duration-300 group-hover:w-full"></span>
      <span class="absolute top-0 left-0 w-0.5 h-[50%] bg-primary-300 transition-all duration-300 group-hover:h-full"></span>
      <span class="absolute right-0 bottom-0 w-0.5 h-[50%] bg-primary-800 transition-all duration-300 group-hover:h-full"></span>
      <span class="absolute bottom-0 right-0 w-[50%] h-0.5 bg-primary-800 transition-all duration-300 group-hover:w-full"></span>
    </a>
  </div>
</header>