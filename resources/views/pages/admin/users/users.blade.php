@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Users')
@section('path', 'Người dùng / Danh Sách Người Dùng')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection

    {{-- search --}}
   
    <div class="w-[40%] pl-4 bg-white rounded-md focus-within:to-blue-300 -ml-3 my-4 ">
      {{-- <form action="{{ route('search-fish') }}" method="get" class="flex justify-between"> --}}
      <form action="" method="get" class="flex justify-between w-full">
        @csrf
        <input type="text" placeholder="Tìm kiếm..." name="fish_name" class="focus:border-red-500 rounded-md outline-none w-full bg-white border-2 py-2 px-2" required>
        <button type="submit" class="inline-block mr-4 mt-2">
          <i class="fa-solid fa-magnifying-glass text-22 text-gray-500 relative -left-8 bottom-1"></i>
        </button>
      </form>
    </div>

    {{-- @if(session('create-success') || session('update-success'))
        <div id="message" class="flex absolute top-12 right-7">
          <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('update-success') ? session('update-success') : session('create-success') }}</span>
            </div>
          </div>
        </div>
    @elseif(session('delete-failed'))
      <div id="message" class="bg-slate-200 absolute top-12 right-7 rounded-lg border-l-8 border-l-red-500 opacity-80">
        <div class="py-4 text-red-500 relative before:absolute before:bottom-0 before:content-[''] before:bg-red-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('delete-failed') }}</span>
        </div>
      </div>
      @elseif(session('delete-success'))
        <div id="message" class="flex absolute top-12 right-7">
          <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('update-success') ? session('update-success') : session('delete-success') }}</span>
            </div>
          </div>
          <button id="btn-rollback" class="border px-4 ml-2 rounded-lg hover:bg-slate-200 hover:text-primary-blue transition-all">Hoàn tác</button>
        </div>
    @endif --}}
    {{-- Danh sách người dùng --}}
    <div class="flex flex-wrap -mx-3 mb-10 mt-2">
      <div class="flex flex-col w-full max-w-full px-3">
        <div class="flex flex-col min-w-[980px] mb-6 break-words bg-white border-0 border-transparent border-solid shadow-md rounded-lg bg-clip-border overflow-hidden">
          <div class="flex p-2 py-2 items-center justify-between">
            {{-- @if($userName)
              <h3 class="text-[#344767] text-20 font-sora">Kết quả tìm kiếm người dùng tên "{{ $userName }}"</h3>
            @else
              <h3 class="text-[#344767] text-20 font-sora">Danh sách người dùng</h3>
            @endif --}}

            <a href="" class="border pr-4 pl-2 py-2 hover:bg-slate-100 hover:text-primary-blue transition-all">
              <i class="fa-solid fa-plus mx-1"></i>
              <span class="">Tạo mới</span>
            </a>
          </div>
          <div class="flex-auto px-0 pt-0">
            <div class="p-0 overflow-x-auto place-self-auto">
              <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                <thead class="align-bottom bg-slate-200 rounded-2xl">
                  <tr class="text-black uppercase text-left text-12">
                    <th class="px-4 py-3 font-bold opacity">#</th>
                    <th class="px-4 py-3 font-bold ">Họ Tên</th>
                    <th class="px-4 py-3 font-bold ">Địa Chỉ</th>
                    <th class="px-20 py-3 font-bold ">Email</th>
                    <th class="px-4 py-3 font-bold text-center">Số Điện Thoại</th>
                    <th class="px-4 py-3 font-bold text-center">Vai Trò</th>
                    <th class="px-4 py-3 font-bold w-[100px] "></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $users)

                    <tr class="border-t even:bg-gray-100 odd:bg-white">
                      <td class="p-4 bg-transparent ">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{ $users->ND_Ho . ' ' . $users->ND_Ten }}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent text-left">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal">{{$users ->ND_Diachi}}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent">
                        <div class="py-1">
                            <h6 class="mb-0 text-sm leading-normal ml-16">{{$users ->email}}</h6>
                        </div>
                      </td>
                      <td class="p-4 bg-transparent">
                        <div class="py-1">
                            <h6 class="mb-0 pl-16 text-sm leading-normal ml-2">{{$users ->ND_SDT}}</h6>
                        </div>
                      </td>
                      {{-- <td class="p-4 bg-transparent">
                        <div class="py-1">
                          <h6 class="mb-0 text-sm leading-normal text-center {{ $user->status_id === 0 ? 'text-blue-100' : 'text-red-200' }} capitalize">{{ $user->status_name }}</h6>
                        </div>
                      </td> --}}
                      <td class="p-4 bg-transparent text-center">
                        <div class="px-2 py-1 rounded-full ">
                            {{-- {{ $users->id === Auth::user()->id  ? 'bg-fuchsia-400 text-white' : ($users->VT_Ma == 1 ? 'bg-cyan-400 text-white' :  '')}} --}}
                            <h6 class="text-sm leading-normal capitalize"> {{ $users->VT_Ten}}</h6>
                        </div>
                      </td>
                      <td class="flex bg-transparent mt-4 justify-center items-center">
                        {{-- <a href="fish/{{$fish->fish_id}}/edit" class="text-16 mr-2 text-blue-100"> --}}
                        <a href="" class="text-16 mr-2 text-blue-100">
                          <i class="fa-regular fa-pen-to-square mr-2"></i>
                        </a>
                        {{-- <button class="delete-fish text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$fish->fish_id}}"> --}}
                        <button class="delete-fish text-16 mr-2 text-red-300 cursor-pointer" data-id="">
                          <i class="fa-regular fa-trash-can text-16"></i>
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>



              <div class="flex justify-between mx-4 py-4 border-t">
                <span class="text-slate-700 text-14 font-light">1 - @if($data->count() < 5) {{ $data->count() }} @else 5 @endif of {{ $data->lastPage() }} entries</span>
                <div class="bg-slate-100 rounded-full">
                  <ol class="pagination flex text-gray-400">

                    <li class="pagination_li hover:bg-slate-200 rounded-full">
                      <a
                          href="{{ $data->previousPageUrl() }}"
                        class="flex items-center h-8 px-3 rounded-full text-center"
                      >
                        <i class="fa-solid fa-angle-left"></i>
                      </a>
                    </li>
                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                      <li
                        class="pagination_li rounded-full
                        {{ $data->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}"
                      >
                        <a
                          href="{{ $data->url($i) }}"
                          class="flex items-center h-8 px-3 rounded-full text-center"
                        >
                          {{ $i }}
                        </a>
                      </li>
                    @endfor

                    <li class="pagination_li hover:bg-slate-200 rounded-full">
                      <a
                          href="{{ $data->nextPageUrl() }}"
                        class="flex items-center h-8 px-3 rounded-full text-center"
                      >
                        <i class="fa-solid fa-angle-right"></i>
                      </a>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>

  </div>
@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection
