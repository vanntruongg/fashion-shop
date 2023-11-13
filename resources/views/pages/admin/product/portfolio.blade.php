@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Danh Sách Danh Mục')
@section('path', 'Sản phẩm / Danh Mục')

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
        <form action="" method="get" class="flex justify-between w-full ">
          @csrf
          <input type="text" placeholder="Tìm kiếm..." name="fish_name" class="focus:border-red-500 border px-2 py-2 rounded-md outline-none w-full bg-white " required>
          <button type="submit" class="inline-block mr-4 mt-2">
            <i class="fa-solid fa-magnifying-glass text-22 text-gray-500 relative -left-8 bottom-0.5"></i>
          </button>
        </form>
      </div>

      @if(session('add-success') || session('update-success') || session('delete-success'))
        <div id="message" class="flex absolute top-12 right-7">
          <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
            <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
              <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
            </div>
          </div>
        </div>
      @endif


      {{-- Table --}}

        <div class="flex flex-wrap -mx-3 mb-10 mt-4 ">
          <div class="flex flex-col w-full max-w-full px-3 ">
            <div class="flex flex-col min-w-[980px] mb-6 bg-white border-2 shadow-md rounded-lg ">
              <div class="flex p-2 py-2 items-center justify-between mb-1 mt-1">
                <h3 class="text-[#344767] text-20 font-sora">Danh sách Danh Mục</h3>
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
                        <th class="px-6 py-3 font-bold opacity">#</th>
                        <th class="px-4 py-3 font-bold">Tên Danh Mục</th>
                        <th class="px-4 py-3 font-bold text-center"></th>
                        {{-- <th class="px-4 py-3 font-bold "></th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $key => $portfolio)
                        <tr class="border-t even:bg-gray-100 odd:bg-white">
                          <td class="p-4 bg-transparent ">
                            <div class="px-2 py-1">
                                <h6 class="mb-0 text-sm leading-normal">{{ ++$key }}</h6>
                            </div>
                          </td>
                          <td class="p-4 bg-transparent text-left">
                            <div class=" py-1">
                                <h6 class="mb-0 text-sm leading-normal">{{$portfolio->DM_Ten}}</h6>
                            </div>
                          </td>
                          
                          <td class="flex bg-transparent mt-4 justify-center items-center">
                            {{-- <a href="fish/{{$fish->fish_id}}/edit" class="text-16 mr-2 text-blue-100"> --}}
                            <a href="{{route('update-portfolio',['id' => $portfolio->DM_STT])}}" class="text-16 mr-2 text-blue-500">
                              <i class="fa-regular fa-pen-to-square mr-2"></i>
                            </a>
                            {{-- <button class="delete-fish text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$fish->fish_id}}"> --}}
                            <button class="delete-portfolio text-16 mr-2 text-red-300 cursor-pointer" data-id="{{$portfolio->DM_STT}}">
                              <i class="fa-regular fa-trash-can text-16"></i>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- phan trang --}}
                  <div class="flex justify-between mx-4 py-4 border-t">
                    <span class="text-slate-700 text-14 font-light">1 - 5 of {{ $data->lastPage() }} entries</span>
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
                             {{ $data->currentPage() == $i ? 'bg-blue-500 hover:bg-blue-700 text-white' : 'hover:bg-slate-200'}}
                            "
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


  </div>
@endsection

@section('footer')
  @include('pages.admin.layout.footer')
@endsection
