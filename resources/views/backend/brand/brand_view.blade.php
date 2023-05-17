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
              <h3 class="box-title">Hover Export Data Table</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th>Brand en</th>
                            <th>Brand uz</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $item)
                            
                        <tr>
                            <td>{{$item->brand_name_en}}</td>
                            <td>{{$item->brand_name_uz}}</td>
                            <td><img src="{{asset($item->brand_image)}}" width="100" alt=""></td>
                            <td>
                                <a href="{{route('brand.edit', $item->id)}}" title="tahrirlash" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{route('brand.delete', $item->id)}}" title="o'chirish" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    <h3 class="box-title">brand qoshish</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>brand english <span class="text-danger">*</span></h5>
                            <input type="text" name="brand_name_en" class="form-control">
                            @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>brand uzbek <span class="text-danger">*</span></h5>
                            <input type="text" name="brand_name_uz" class="form-control">
                            @error('brand_name_uz')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>brand rasmi <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control">
                            </div>
                            @error('brand_image')
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
  
@endsection