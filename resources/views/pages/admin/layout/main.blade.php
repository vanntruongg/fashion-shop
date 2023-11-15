<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  @vite([
    './resources/css/app.css',
    './resources/js/app.js',
    './resources/js/admin/slidebar.js',
    './resources/js/admin/dashboard.js',
    './resources/js/admin/chart.js',
    './resources/js/admin/product.js',
    './resources/js/admin/user.js',
    './resources/js/admin/order.js',
    './resources/js/info-user.js',
  ])
</head>
<body class="scrollbar-thin scroll-smooth scrollbar-thumb-rounded-lg scrollbar-thumb-blue-200 scrollbar-track-gray-100">

  {{-- <div class="fixed w-full min-h-[18.75rem]"></div> --}}
  <div class="app">

      <div class="flex relative">

        <aside class="slide-bar max-h-[100vh] w-[18%] bg-white sticky top-0 transform transition-all duration-500">
          @yield('slidebar')
        </aside>


        <div class="content bg-white w-full ml-auto mr-auto transform transition-all duration-500">

          {{-- Header --}}
          <header class="bg-white sticky top-0 border-b z-10">
            @yield('header')
          </header>

          {{-- Content --}}
          <main class="mt-2 mx-6 mb-10">
            @yield('content')
          </main>

          {{-- Footer --}}
          <footer class="mb-2 mx-6 fixed bottom-0 right-0">
            @yield('footer')
          </footer>

        </div>
        {{-- overlay delete user --}}
        <div class="overlay-delete hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-user hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa người dùng này?</h2>
          <form
            action="{{ route('delete-user')}}"
            method="post"
          >
            @csrf
            <input id="idUser" type="text" name="user_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-user border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>
        {{-- delete product --}}
        <div class="overlay-delete hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-product hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa sản phẩm này?</h2>
          <form
            action="{{ route('delete-product')}}"
            method="post"
          >
            @csrf
            <input id="idProduct" type="text" name="product_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-product border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>
        {{-- delete category --}}
        <div class="overlay-delete hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-category hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa loại sản phẩm này?</h2>
          <form
            action="{{ route('delete-category')}}"
            method="post"
          >
            @csrf
            <input id="idCategory" type="text" name="category_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-category border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>
        {{-- delete portfolio  --}}
        <div class="overlay-delete hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-portfolio hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa danh mục này?</h2>
          <form
            action="{{ route('delete-portfolio')}}"
            method="post"
          >
            @csrf
            <input id="idPortfolio" type="text" name="portfolio_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-portfolio border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>
        {{--  --}}
        {{-- overlay delete order--}}
        <div class="overlay-delete hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-order hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa đơn hàng này?</h2>
          <form
            action="{{ route('delete-order')}}"
            method="post"
          >
            @csrf
            <input id="idOrder" type="text" name="order_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-order border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>
        {{--  --}}
        <div class="overlay-delete hidden fixed inset-0 bg-black bg-opacity-20 z-40 transition-all animate-fadeIn duration-500"></div>
        <div class="modal-delete-importwarehouse hidden fixed top-[25%] left-[35%] bg-white p-6 py-10 min-h-[120px] rounded-lg z-50 animate-fadeIn">
          <h2 class="text-18 mb-10">Bạn có chắc chắn muốn xóa loại sản phẩm này?</h2>
          <form
            action="{{ route('delete-importwarehouse')}}"
            method="post"
          >
            @csrf
            <input id="idImportwarehouse" type="text" name="importwarehouse_id" hidden>
            <div class="flex justify-around">
              <span
                class="cancel-delete-importwarehouse border px-6 py-2 cursor-pointer hover:text-blue-900 hover:bg-slate-100"
              >
                Hủy
              </span>
              <button
                type="submit"
                class="border px-6 py-2 bg-slate-100 hover:text-red-500 hover:border-red-500"
              >
                Xóa
              </button>
            </div>
          </form>
        </div>
        {{--  --}}
      </div>
    </div>

  </div >

</body>
</html>
