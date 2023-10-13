<div class="select-none items-center ml-2 mr-6 py-2.5">

    <div class="flex items-center justify-between">
      <div class="">
        <div class="text-14 text-slate-400"><span class="text-slate-300">Trang </span> / @yield('path')</div>
      </div>
      <div class="items-center">
        <div class="flex text-slate-500">
            
            </div>
          <div class="pl-4 text-[#848484] text-14">
            <div class="flex hover:opacity-80 icon-dropdown">
                <i class="fa-solid fa-circle-user cursor-pointer text-20"></i>
                {{-- @if (Auth::check())
    
                  @if (Auth::user()->ND_Ten)
                    <span class="icon-dropdown cursor-pointer px-2">
                      {{ Auth::user()->ND_Ten }}
                    </span>
                  @endif
                @endif --}}
                <span class="icon-dropdown cursor-pointer px-2">
                  Admin
                </span>
            <div class="menu-dropdown bg-slate-50 min-w-[116px] top-8 right-6 absolute hidden shadow-md text-blue-900 animate-topToBottom leading-[40px] rounded-sm z-10 mt-2">
              <ul class="">
                <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center border-b transform transition-all duration-300">
                    <a href="" type="submit" class="text-black"> 
                      Tài khoản của tôi
                    </a>
                  </form >
                </li>
                <li class="hover:bg-slate-200 hover:rounded-sm px-2 text-center transform transition-all duration-300">
                  {{-- <form action="{{route('logout')}}" method="post"> --}}
                  <form action="" method="post">
                      @csrf
                    <button type="submit">Đăng xuất</button>
                  </form>
                </li>
              </ul>
            </div>
           
          </div>
        </div>
      </div>
    </div >
  </div >
  