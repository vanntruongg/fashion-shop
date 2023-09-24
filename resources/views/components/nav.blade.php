<nav class="mb-4">
    <ul class="flex justify-center gap-6 text-22 font-semibold font-sans">
        <li class="{{request()->is('/') ? 'text-primary-600' : ''}} transition-all duration-300 hover:text-primary-600 relative group">
            <a href={{route('home')}}>Trang chủ</a>
            <span class="{{request()->is('/') ? 'w-full left-0' : 'w-0 left-[50%]'}} bg-primary-600 absolute bottom-0 h-0.5 transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </li>
        <li class="{{request()->is('products') ? 'text-primary-600' : ''}} transition-all duration-300 hover:text-primary-600 relative group">
            <a href={{route('products')}}>Sản phẩm</a>
            <span class="{{request()->is('products') ? 'w-full left-0' : 'w-0 left-[50%]'}} bg-primary-600 absolute bottom-0 h-0.5 transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </li>
        <li class="{{request()->is('contact') ? 'text-primary-600' : ''}} transition-all duration-300 hover:text-primary-600 relative group">
            <a href={{route('contact')}}>Liên hệ</a>
            <span class="{{request()->is('contact') ? 'w-full left-0' : 'w-0 left-[50%]'}} bg-primary-600 absolute bottom-0 h-0.5 transition-all duration-300 group-hover:left-0 group-hover:w-full"></span>
        </li>
    </ul>
</nav>