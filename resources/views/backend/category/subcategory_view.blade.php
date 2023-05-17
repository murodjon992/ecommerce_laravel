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
              <h3 class="box-title">Sub turkumlar ro'yhati</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Category en</th>
                            <th>Category uz</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $item)
                            
                        <tr>
                            <td>{{$item['category']['category_name_en']}}</td>
                            <td>{{$item->subcategory_name_en}}</td>
                            <td>{{$item->subcategory_name_uz}}</td>
                            <td>
                                <a href="{{route('subcategory.edit', $item->id)}}" title="tahrirlash" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{route('subcategory.delete', $item->id)}}" title="o'chirish" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">Yordamchi tur qo'shish</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Turkum english <span class="text-danger">*</span></h5>
                            <input type="text" name="subcategory_name_en" class="form-control">
                            @error('subcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Turkum uzbek <span class="text-danger">*</span></h5>
                            <input type="text" name="subcategory_name_uz" class="form-control">
                            @error('subcategory_name_uz')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       <div class="form-group">
                        <h5>Turkumni tanlang</h5>
                        <div class="controls">
                            <select name="category_id" class="form-control" id="select">
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
  
@endsection