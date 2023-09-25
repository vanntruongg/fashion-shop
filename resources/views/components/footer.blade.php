  <footer class="text-14">
    <div class="bg-primary-800 text-white p-8 grid grid-cols-4 gap-16">
      {{-- info shop --}}
      <div class="flex flex-col justify-between">
        <h4 class="uppercase pb-2">Fashion Shop 3Man</h4>
        <div class="flex justify-between">
          <span>Địa chỉ:</span><span>Ninh Kiều, Cần Thơ</span>
        </div>
        <div class="flex justify-between">
          <span>Số điện thoại:</span><span>8000 8000</span>
        </div>
        <div class="flex justify-between">
          <span>Email:</span><span>fashionshop@3man.com</span>
        </div>
      </div>
      {{-- About shop --}}
      <div class="">
        <h4 class="uppercase pb-2">Thông tin</h4>
        <ul class="text-gray-400">
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Về chúng tôi</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Thông tin giao hàng</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Thông tin bảo mật</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Điều khoản & Điều kiện</a></li>
        </ul>
      </div>
      {{-- Contact shop --}}
        
      <div class="">
        <h4 class="uppercase pb-2">Đăng ký nhận thông báo</h4>
        <p class="">Đăng ký email để nhanh chóng nhận được thông tin về các sản phẩm mới và chương trình khuyến mãi của chúng tôi</p>
        <div class="my-2">
          <form action="" method="" class="flex">
            <input type="email" placeholder="Nhập email..." required class="p-2 text-gray-700 rounded-l-lg">
            <button class="bg-primary-300 px-2 uppercase rounded-r-lg transition-all duration-200 hover:bg-primary-400">Đăng ký</button>
          </form>
        </div>
      </div>
      {{-- Support --}}
      <div class="">
        <h4 class="uppercase pb-2">Tư vấn</h4>
        <ul class="text-gray-400">
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Tư vấn phối đồ</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Thế giới thời trang</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Tin khuyến mãi</a></li>
          <li class=""><a href="" class="hover:text-primary-200 hover:underline">Tin khai trương</a></li>
        </ul>
      </div>
    </div>
    <div class="bg-primary-950 text-gray-300 text-12 py-1 flex justify-center gap-2">
      <p>© Bản quyền thuộc về Thời trang nam 3MAN</p>
      <span>-</span>
      <p> Make by ❤️ 3TL Team</p>
    </div>
  </footer>

  
  @if ($jsFile)
        @vite($jsFile)
  @endif
</body>

</html>