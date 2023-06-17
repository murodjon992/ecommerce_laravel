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
              <h3 class="box-title">Slider List</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th>Slider Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders  as $item)
                            
                        <tr>
                            <td><img width="100" height="60"src="{{asset($item->slider_img)}}" alt=""></td>
                            <td>
                                @if($item->title == NULL)
                                <span class="badge badge-pill badge-danger">Sarlavha yo'q</span>
                                @else
                                <span class="badge badge-pill badge-primary"> {{$item->title}}</span>

                                @endif
                               
                            
                            
                            </td>
                            <td>{{$item->description}}</td>
                            <td>
                                @if($item->status == 1)
                                <span class="badge badge-pill badge-success">active</span>
                                @else
                                <span class="badge badge-pill badge-danger">Inactive</span>

                                @endif
                            </td>
                            <td>
                                <a href="{{route('slider.edit', $item->id)}}" title="tahrirlash" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{route('slider.delete', $item->id)}}" title="o'chirish" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                @if($item->status == 1)
                                <a href="{{route('slider.inactive', $item->id)}}" title="o'chirish" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{route('slider.active', $item->id)}}" title="o'chirish" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
                                @endif
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
                    <h3 class="box-title">Slider qoshish</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Slider Sarlavha <span class="text-danger">*</span></h5>
                            <input type="text" name="title" class="form-control">
                            @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Slider Izoh <span class="text-danger">*</span></h5>
                            <input type="text" name="description" class="form-control">
                            @error('brand_name_uz')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Slider rasmi <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="slider_img" class="form-control">
                            </div>
                            @error('slider_img')
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