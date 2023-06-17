@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">slider tahrirlash</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('slider.update'), $sliders->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$sliders->id}}">
                                <input type="hidden" name="old_image" value="{{$sliders->slider_img}}">
                                <div class="row">
                                    <div class="offset-3 col-4">
                                        <div class="form-group">
                                            <h5>Slider Title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title" value="{{ $sliders->title}}" required class="form-control">
                                            </div>
                                            @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Slider Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="description" value="{{ $sliders->description}}" class="form-control">
                                            </div>
                                            @error('product_name_uz')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Slider Rasm<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="slider_img" value="{{ $sliders->slider_img}}" class="form-control">
                                            </div>
                                            @error('slider_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit">Mahsulot yangilash</button>
                                        </div>
                                    </div>
                                </div>
                            
                              
                            </form>
                        </div>
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
        function mainThamUrlPastki(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThm').attr('src', e.target.result).width(80).height(80)
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
