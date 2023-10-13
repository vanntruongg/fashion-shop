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
      </div>
    </div>

  </div >

</body>
</html>
