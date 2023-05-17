@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-8">

         
            <!-- /.box-body -->
          <!-- /.box -->

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sub ichki turkumlar ro'yhati</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>SubCategory en</th>
                            <th>SubSubCategory uz</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subsubcategory as $item)
                            
                        <tr>
                            <td>{{$item['category']['category_name_en']}}</td>
                            <td>{{$item['subcategory']['subcategory_name_en']}}</td>
                            <td>{{$item->subsubcategory_name_en}}</td>
                            <td>
                                <a href="{{route('subsubcategory.edit', $item->id)}}" title="tahrirlash" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{route('subsubcategory.delete', $item->id)}}" title="o'chirish" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                      
                    </tbody>				  
                   
                </table>
                </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Yordamchi ichki tur qo'shish</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('subsubcategory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Turkumni tanlang</h5>
                            <div class="controls">
                                <select name="category_id" class="form-control" id="select">
                                    <option value="">Tanlang</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                            
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
                                        <option value="" disabled>tanlang</option>
                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="help-block"></div>
                           </div>
                        <div class="form-group">
                            <h5>Turkum english <span class="text-danger">*</span></h5>
                            <input type="text" name="subsubcategory_name_en" class="form-control">
                            @error('subsubcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Turkum uzbek <span class="text-danger">*</span></h5>
                            <input type="text" name="subsubcategory_name_uz" class="form-control">
                            @error('subsubcategory_name_uz')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>     
                        <button class="btn btn-primary" type="submit"> qo'shish</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
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