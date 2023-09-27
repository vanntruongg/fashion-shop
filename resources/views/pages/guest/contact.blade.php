@component('components.head', ['title' => 'Liện hệ với chúng tôi'])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
  <div class="grid grid-cols-3 gap-8 px-16">
    <div class="col-span-2 w-full">
      <form action="w-full">
        <div class="w-full my-2">
          <label for="" class="font-medium">Họ và tên <span class="text-12 text-red-500">*</span></label>
          <input type="text" placeholder="Nhập họ tên của bạn" name="fullName" id="" class="px-4 py-2 w-full border border-slate-400 rounded-lg my-1">
        </div>
        <div class="w-full my-2">
          <label for="" class="font-medium">Email <span class="text-12 text-red-500">*</span></label>
          <input type="email" placeholder="Nhập email của bạn" name="email" id="" class="px-4 py-2 w-full border border-slate-400 rounded-lg my-1">
        </div>
        <div class="w-full my-2">
          <label for="" class="font-medium">Số điện thoại <span class="text-12 text-red-500">*</span></label>
          <input type="number" placeholder="Nhập số điện thoại của bạn" name="phone" id="" class="px-4 py-2 w-full border border-slate-400 rounded-lg my-1">
        </div>
        <div class="w-full my-2">
          <label for="" class="font-medium">Ghi chú <span class="text-12 text-red-500">*</span></label>
          <textarea placeholder="Ghi chú" name="note" id="" cols="30" rows="5" class="px-4 py-2 border outline-none border-slate-400 rounded-lg w-full my-1"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 border border-primary-500 text-primary-500 rounded-lg">Gửi</button>
      </form>
    </div>
    <div class="">
      <h3 class="text-24">Thời Trang Nam 3MAN</h3>
      <div class="">
        <div class="my-6">
          <span class="mr-2">Địa chỉ:</span>
          <span>Ninh Kiều, Cần Thơ</span>
        </div>
        <div class="my-6">
          <span class="mr-2">Email:</span>
          <span>fashionshop@3man.com</span>
        </div>
        <div class="my-6">
          <span class="mr-2">Số điện thoại:</span>
          <span>8000 8000</span>
        </div>
      </div>
    </div>
  </div>
</main>


<x-footer :js-file="''" />