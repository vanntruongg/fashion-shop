@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Danh Sách Sản Phẩm')
@section('path', 'Sản phẩm / Sản Phẩm')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
    <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection
    <div class="w-full">

        <div class="w-[40%] pl-4  bg-white rounded-md focus-within:to-blue-300 -ml-3 my-4 ">
            {{-- <form action="{{ route('search-fish') }}" method="get" class="flex justify-between"> --}}
            <form action="{{route('search-users')}}" method="get" class="flex justify-between w-full ">
              @csrf
              <input type="text" placeholder="Tìm kiếm..." name="ND_Ten" class="focus:border-red-500 border px-2 py-2 rounded-md outline-none w-full bg-white " required>
              <button type="submit" class="inline-block mr-4 mt-2">
                <i class="fa-solid fa-magnifying-glass text-22 text-gray-500 relative -left-8 bottom-0.5"></i>
              </button>
            </form>
          </div>

      {{-- Table --}}

      <div class="flex flex-wrap -mx-3 mb-10 mt-4">
        <div class="flex flex-col w-full max-w-full px-3">
          <div class="flex flex-col min-w-[980px] mb-6 bg-white border-0 shadow-md rounded-lg ">
            @if($data->count() == 0)
              <h2 class="ml-2 my-4 text-20 font-sora">Không tìm thấy kết quả phù hợp cho "{{$ND_Ten}}"</h2>
            @else
            <div class="flex p-2 py-2 items-center justify-between">
              <h3 class="text-[#344767] text-20 font-sora">Kết quả tìm kiếm cho "{{ $ND_Ten }}"</h3>
            </div>
            @if(session('success'))
              <div id="message" class="backdrop-blur-2xl absolute top-2 left-[40%] rounded-lg border-l-8 border-l-blue-500 opacity-80">
                <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                  <span class="px-4">{{ session('success') }}</span>
                </div>
              </div>
            @endif
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
                          <td class="p-4 bg-transparent text-center">
                            <div class="px-2 py-1 rounded-full {{ $users->id === Auth::user()->id  ? 'bg-fuchsia-400 text-white' : ($users->ND_VT == 1 ? 'bg-cyan-400 text-white' :  '')}}">
                                <h6 class="text-sm leading-normal capitalize"> {{ $users->VT_Ten}}</h6>
                            </div>
                          </td>
                          
                          <td class="flex bg-transparent mt-4 justify-center items-center">
                            {{-- <a href="fish/{{$fish->fish_id}}/edit" class="text-16 mr-2 text-blue-100"> --}}
                            <a href="users/{{$users->id}}/update-users" class="text-16 mr-2 text-blue-400">
                              <i class="fa-regular fa-pen-to-square mr-2"></i>
                            </a>
                            {{-- <button class="delete-fish text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$fish->fish_id}}"> --}}
                            <button class="delete-user text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$users->id}}">
                              <i class="fa-regular fa-trash-can text-16"></i>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>

          @endif
        </div>
      </div>
    </div>


  </div>
@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection

                          