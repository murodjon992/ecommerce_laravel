@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Mahsulot tahrirlash</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('product-update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$products->id}}">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Brand tanlang</h5>
                                            <div class="controls">
                                                <select name="brand_id" class="form-control" id="select">
                                                    <option value="">tanlang</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{$brand->id == $products->brand_id ? 'selected' : ''}}>{{ $brand->brand_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Turkumni tanlang</h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" id="select">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{$category->id == $products->category_id ? 'selected' : ''}}>
                                                            {{ $category->category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Turkumni tanlang</h5>
                                            <div class="controls">
                                                <select name="subcategory_id" class="form-control" id="select">
                                                    @foreach ($subcategory as $sub)
                                                        <option value="{{ $sub->id }}" {{$sub->id == $products->subcategory_id ? 'selected' : ''}}>
                                                            {{ $sub->subcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>yordamchi Turkumni tanlang</h5>
                                            <div class="controls">
                                                <select name="subsubcategory_id" class="form-control" id="select">
                                                  <option selected disabled value="">tanlang</option>
                                                  @foreach ($subsubcategory as $subsub)
                                                  <option value="{{ $subsub->id }}" {{$subsub->id == $products->subsubcategory_id ? 'selected' : ''}}>
                                                      {{ $subsub->subsubcategory_name_en }}</option>
                                              @endforeach
                                                </select>
                                                @error('subsubcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot nomi En<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_en" value="{{ $products->product_name_en}}" required class="form-control">
                                            </div>
                                            @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot nomi Uz<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_uz" value="{{ $products->product_name_uz}}" required class="form-control">
                                            </div>
                                            @error('product_name_uz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot Kodi <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_code" value="{{ $products->product_code}}" required class="form-control">
                                            </div>
                                            @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_qty" value="{{ $products->product_qty}}" required class="form-control">
                                            </div>
                                            @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot turkumi En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en}}" required data-role="tagsinput">
                                            </div>
                                            @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot turkumi UZ <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tags_uz" value="{{ $products->product_tags_uz}}" class="form-control" required data-role="tagsinput">
                                            </div>
                                            @error('product_tags_uz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot razmeri En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_en"  value="{{ $products->product_size_en}}" class="form-control" required data-role="tagsinput">
                                            </div>
                                            @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot razmeri UZ <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_uz"  value="{{ $products->product_size_uz}}" class="form-control" required data-role="tagsinput">
                                            </div>
                                            @error('product_size_uz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot rangi En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_en"  value="{{ $products->product_color_en}}" class="form-control" required data-role="tagsinput">
                                            </div>
                                            @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot rangi uz <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_uz"  value="{{ $products->product_color_uz}}" class="form-control" required data-role="tagsinput">
                                            </div>
                                            @error('product_color_uz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot sotilish narxi <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="selling_price"  value="{{ $products->selling_price}}" required class="form-control" >
                                            </div>
                                        </div>
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot chegirma narxi <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price"  value="{{ $products->discount_price}}" required class="form-control" >
                                            </div>
                                            @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Mahsulot thambnail <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="product_thambnail" onChange="mainThamUrl(this)" class="form-control" >
                                            </div>
                                            @error('product_thambnail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="" id="mainThmb" alt="">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <h5>Xar xil rasmlar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="multi_img[]" multiple="" id="multiImg" class="form-control" >
                                            </div>
                                            @error('product_img[]')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row" id="preview_img">

                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Qisqa izoh en <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input name="short_descp_en"  value="{{ $products->short_descp_en}}" id="textarea" class="form-control" required placeholder="Textarea text">
                                            </div>
                                            @error('short_descp_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Qisqa izoh uz <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input name="short_descp_uz"  value="{{ $products->short_descp_uz}}" id="textarea" class="form-control" required placeholder="Textarea text">
                                            </div>
                                            @error('short_descp_uz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Ko'proq izoh En</label>
                                        <textarea id="editor1" required name="long_descp_en" rows="10" cols="80">
                                            {!!$products->long_descp_en!!}
                                         </textarea>
                                         @error('long_descp_en')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                    </div>
                                    <div class="col-6">
                                        <h4 for="">Ko'proq izoh Uz</h4>
                                        <textarea id="editor2" required  name="long_descp_uz" rows="10" cols="80">
                                            {!!$products->long_descp_uz!!}
                                         </textarea>
                                         @error('long_descp_uz')
                                         <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group mt-4">
                                            <div class="demo-checkbox">
                                                        <input type="checkbox" name="hot_deals" id="basic_checkbox_1" {{$products->hot_deals == 1 ? 'checked' : ''}} value="1" />
                                                        <label for="basic_checkbox_1">Hot deals</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group mt-4">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" name="featured" {{$products->featured == 1 ? 'checked' : ''}} id="basic_checkbox_2" value="1" />
                                                <label for="basic_checkbox_2">featured</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group mt-4">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" name="special_offer" {{$products->special_offer == 1 ? 'checked' : ''}} id="basic_checkbox_3" value="1" />
                                                <label for="basic_checkbox_3">Special offer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group mt-4">
                                            <div class="demo-checkbox">
                                                <input type="checkbox" name="special_dears" {{$products->special_dears == 1 ? 'checked' : ''}} id="basic_checkbox_4" value="1" />
                                                <label for="basic_checkbox_4">Special dears</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Mahsulot yangilash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Mahsulot rasmlarini <strong> yangilash</strong></h4>
                    </div>
                    <div class="box-body">
                    <form action="{{route('update-product-image')}}" method="post" enctype="multipart/form-data">
                        <div class="row row-sm">
                            @foreach ($multiImgs as $img)
                                
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{asset($img->photo_name)}}" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a></h5>
                                        <p class="card-text">

                                            <p class="text-light">Rasm Almashtirish</p>
                                            <input class="form-control" name="multi_img[$img->id]" type="file"/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="btn btn-rounded btn-primary" type="submit">Rasm yangilash</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
      console.log('salom');
  $(document).ready(function(){
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val()
          if (category_id) {
              $.ajax({
                  url:"{{ url('/category/subcategory/ajax')}}/"+category_id,
                  type: 'GET',
                  dataType: "json",
                  success: function(data){
                      var d = $('select[name="subcategory_id"]').empty();
                      $.each(data,function(key,value){
                          $('select[name="subcategory_id"]').append('<option value="'+value.id + '">' + value.subcategory_name_en + '</option>')
                      });
                  },
              });
          } else{
              alert('xato')
          }
      })
      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val()
          if (subcategory_id) {
              $.ajax({
                  url:"{{ url('/category/sub-subcategory/ajax')}}/"+subcategory_id,
                  type: 'GET',
                  dataType: "json",
                  success: function(data){
                      var d = $('select[name="subsubcategory_id"]').empty();
                      $.each(data,function(key,value){
                          $('select[name="subsubcategory_id"]').append('<option value="'+value.id + '">' + value.subsubcategory_name_en + '</option>')
                      });
                  },
              });
          } else{
              alert('xato')
          }
      })
  })
  </script>
  <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80)
                };
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <script>
 
        $(document).ready(function(){
         $('#multiImg').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                 
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).height(80); //create image element 
                            $('#preview_img').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
                 
            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
         });
        });
         
        </script>
@endsection
