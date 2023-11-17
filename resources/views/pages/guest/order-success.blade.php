@component('components.head', ['title' => 'Đặt hàng thành công'])
@endcomponent

<main class="max-w-[1360px] mx-auto px-16 my-10 mt-[137px]">
  <div class="container mx-auto mt-8">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Cảm ơn bạn đã đặt hàng!</h2>
        <p class="text-gray-700">Chúng tôi đã nhận được đơn hàng của bạn. Đơn hàng của bạn sẽ được xử lý trong thời gian sớm nhất.</p>
        <a href="{{ route('home') }}" class="text-blue-500 mt-4 inline-block">Quay lại trang chủ</a>
    </div>
</div>
</main>


<x-footer :js-file="''" />