@extends('pages.admin.layout.main')

{{-- set title --}}
@section('title', 'Tạo mới Hóa Đơn Nhập')
@section('path', 'Thêm mới / Hóa Đơn Nhập')

@section('slidebar')
  @include('pages.admin.layout.slidebar')
@endsection

@section('content')
  <div class="mb-2">
    @section('header')
      @include('pages.admin.layout.header')
    @endsection

    @if(session('add-success') || session('update-success') || session('delete-success'))
    <div id="message" class="flex absolute top-12 right-7">
      <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
        <div class="py-4 text-blue-400 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
          <span class="px-4">{{ session('add-success') ? session('add-success') : (session('update-success') ? session('update-success') : session('delete-success')) }}</span>
        </div>
      </div>
    </div>
    @endif

    <div>
      <div class="py-4 pt-2 ml-2 text-24 font-sora text-[#5432a8]">Thêm mới Hóa Đơn Nhập</div>
      @if(session('create-success'))
          <div id="message" class="flex absolute top-12 right-7">
            <div  class="bg-slate-200 rounded-lg border-l-8 border-l-blue-500 opacity-80">
              <div class="py-4 text-blue-100 relative before:absolute before:bottom-0 before:content-[''] before:bg-blue-500 before:h-0.5 before:w-full before:animate-before">
                <span class="px-4">{{ session('create-success') }}</span>
              </div>
            </div>
          </div>
        @endif
    </div>
    
    {{--  --}}
    <div class="">
        @if($errors->any())
            <div class="alert alert-danger text-red-400 text-14 ml-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="border mt-6 p-2 rounded-xl shadow-xl">
            <div class="mt-4 mb-2">
                <label
                for="HDN_Ngay"
                class="text-slate-500 text-14"
                >
                    Ngày
                </label><br>
                <div class="border-[1.5px] mt-1">
                <input
                    type="date"
                    name="HDN_Ngay"
                    placeholder="ngày tạo"
                    class="pb-2 pt-1 w-full outline-none focus-within:border-blue-500 px-3 placeholder:text-14 text-14"
                >
                </div>
            </div>
            <div class="mt-4 mb-2">
                <label
                for="HDN_GhiChu"
                class="text-slate-500 text-14"
                >
                    Ghi chú
                </label><br>
                <div class="border-[1.5px] mt-1">
                <input
                    type="text"
                    name="HDN_GhiChu"
                    placeholder="Ghi chú"
                    class="pb-6 pt-1 w-full outline-none focus-within:border-blue-500 px-3 placeholder:text-14 text-14"
                >
                </div>
            </div>
        </div>
        <div class="border mt-6 p-2 rounded-xl shadow-xl">
        
            <div class="">
                <div class="col-span-3 p-4">
                    
                    
                    <!-- Mã của sản phẩm đầu tiên -->
                    <div id="product-container">
                        <div class="product-form">
                            <div class="flex items-center justify-between mt-10 mb-6">
                                <div class="w-80 h-32 mr-10">
                                  <img
                                    id="img-preview"
                                    src="{{ URL::to('/storage/images/admin/shirt_default.png')}}"
                                    alt="image-product"
                                    class="w-36 h-36 ml-10"
                                  >
                                </div>
                    
                                <input
                                  id="input-file-img[]"
                                  type="file"
                                  name="product-img[]"
                                  placeholder=""
                                  class="w-full py-8 text-14 border border-slate-500 file:ml-2 rounded-lg border-dashed text-slate-500 cursor-pointer file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-none file:bg-[#5490f0] file:text-white file:cursor-pointer file:hover:bg-blue-100"
                                >
                              </div>
                    
                    
                              <div class="grid grid-cols-3 gap-4">
                                <div class="">
                                  <label
                                    for="SP_LSP"
                                    class="text-slate-500 text-14"
                                  >
                                  Loại Sản Phẩm
                                  </label><br>
                                  <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                    <select
                                      name="SP_LSP[]"
                                      class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                                    >
                                        @foreach($loaisanpham as $loaisp)
                                          <option value="{{ $loaisp->LSP_Ma }}">{{ $loaisp->LSP_Ten }}</option>
                                        @endforeach
                                      {{-- <option value=""></option> --}}
                                    </select>
                                  </div>
                                </div>
                                <div class="">
                                  <label
                                    for="SP_Ten"
                                    class="text-slate-500 text-14"
                                  >
                                    Tên
                                  </label><br>
                                  <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                    <input
                                      type="text"
                                      name="SP_Ten[]"
                                      placeholder="Nhập tên"
                                      class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                    >
                                  </div>
                                </div>
                                <div class="">
                                  <label
                                    for="SP_Chatlieu"
                                    class="text-slate-500 text-14"
                                  >
                                    Chất liệu
                                  </label><br>
                                  <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                    <input
                                      type="text"
                                      name="SP_Chatlieu[]"
                                      placeholder="Nhập"
                                      class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                    >
                                  </div>
                                </div>
                    
                    
                                
                              </div>
                              <div class="grid grid-cols-3 gap-4 mt-4">
                                <div class="">
                                  <label
                                    for="SP_Mausac"
                                    class="text-slate-500 text-14"
                                  >
                                    Màu Sắc
                                  </label><br>
                                  <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                    <select
                                      name="SP_Mausac[]"
                                      class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                                    >
                                      @foreach($mausac as $value)
                                        <option value="{{ $value->MS_Ma }}">{{ $value->MS_TenMau }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                    
                                <div class="">
                                  <label
                                    for="SP_Kichthuoc"
                                    class="text-slate-500 text-14"
                                  >
                                    Kích Thước
                                  </label><br>
                                  <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                    <select
                                      name="SP_Kichthuoc[]"
                                      class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14 cursor-pointer"
                                    >
                                      @foreach($kichthuoc as $value)
                                        <option value="{{ $value->KT_Ma}}">{{ $value->KT_Ten }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="">
                                    <label
                                      for="SP_Gia"
                                      class="text-slate-500 text-14"
                                    >
                                      Giá Bán
                                    </label><br>
                                    <div class="flex items-center border-[1.5px] mt-1 rounded-lg focus-within:border-blue-200">
                                      <input
                                        type="text"
                                        name="SP_Gia[]"
                                        placeholder="Nhập giá"
                                        class="py-1.5 px-2 w-full outline-none rounded-lg placeholder:text-14 text-14"
                                      >
                                    </div>
                                </div>
                    
                    
                              </div>
                    
                            <div class="grid grid-cols-3 gap-4">
                                <div class="mt-4 ">
                                  <label
                                    for="SP_Soluong"
                                    class="text-slate-500 text-14"
                                  >
                                    Số lượng
                                  </label><br>
                                  <div class="border-[1.5px] mt-1">
                                    <input
                                      type="text"
                                      name="SP_Soluong[]"
                                      placeholder="Nhập"
                                      class="pb-11 pt-1 w-full outline-none focus-within:border-blue-500 px-2 placeholder:text-14 text-14 "
                                    >
                                  </div>
                                </div>
                            </div>
                           
                                <button class="flex border-2 border-blue-500 p-2 mb-4 px-6 mt-4 hover:bg-slate-100 " type="button" onclick="removeProductForm(this)">Xóa Sản Phẩm</button>    
                        </div>
                        
                         
                    </div> 
                   
            </div>
            </div>
        </div> 
        <div class="border p-2 rounded-xl shadow-xl w-full flex justify-end">
            <div class="mr-4">
                <button class="flex border-2 border-blue-500 p-2 mb-4 px-6 mt-4 hover:bg-slate-100 " type="button" onclick="addProductForm()">Thêm Sản Phẩm</button>
            </div>
            <div>
                <button class="flex border-2 border-blue-500 p-2 mb-4 px-6 mt-4 hover:bg-slate-100 " type="submit">Lưu Hóa Đơn Nhập</button>
            </div>
           
            
        </div>
        
    </form>
    </div>
    
@endsection

{{-- <script>
    function addProductForm() {
        var lastIndex = document.querySelectorAll('[name^="products"]').length - 1;
      
        var productContainer = document.getElementById('product-container');
        var newProduct = productContainer.cloneNode(true);

        var inputs = newProduct.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
            inputs[i].name = inputs[i].name.replace(/\[\d\]/g, '[' + (lastIndex + 1) + ']');
        }

        productContainer.parentNode.appendChild(newProduct);
    }
</script> --}}
<script>
    function addProductForm() {
        var clonedForm = document.querySelector('.product-form').cloneNode(true);
        var inputFields = clonedForm.querySelectorAll('input');
        inputFields.forEach(function(input) {
            input.value = '';
        });

        document.getElementById('product-container').appendChild(clonedForm);
    }

    function removeProductForm(button) {
        button.parentNode.remove();
    }
</script>

@section('footer')
  @include('pages.admin.layout.footer')
@endsection
