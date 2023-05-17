@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
        <div class="box-header">
            <h5>Turkum tahrirlash</h5>
        </div>
        <div class="box-body">
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yordamchi ichki tur qo'shish</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{route('subsubcategory.update',$subsubcategories->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$subsubcategories->id}}">
                            <div class="form-group">
                                <h5>Turkumni tanlang</h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control" id="select">
                                        <option value="">Tanlang</option>
                                            @foreach ($categories as $category)
                                            <option {{ $category->id == $subsubcategories->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name_en}}</option>
                                                @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="help-block"></div>
                               </div>
                               <div class="form-group">
                                <h5>yordamchi Turkumni tanlang</h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control" id="select">
                                            <option value="">tanlang</option>
                                    </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="help-block"></div>
                               </div>
                            <div class="form-group">
                                <h5>Turkum english <span class="text-danger">*</span></h5>
                                <input type="text" name="subsubcategory_name_en" value="{{$subsubcategories->subsubcategory_name_en}}" class="form-control">
                                @error('subsubcategory_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Turkum uzbek <span class="text-danger">*</span></h5>
                                <input type="text" name="subsubcategory_name_uz" value="{{$subsubcategories->subsubcategory_name_uz}}"class="form-control">
                                @error('subsubcategory_name_uz')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>  
                            <button class="btn btn-info" type="submit"> yangilash</button>
                        </form>
                    </div>
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
  })
  </script>
@endsection