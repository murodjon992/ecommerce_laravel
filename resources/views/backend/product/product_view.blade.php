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
                            <th>IMAGE</th>
                            <th>Product name En</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            
                        <tr>
                            <td><img width="100" height="60"src="{{asset($item->product_thambnail)}}" alt=""></td>
                            <td>{{$item->product_name_en}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->product_qty}}</td>
                            <td>
                                @if($item->discount_price == NULL)
                                <span class="badge badge-pill badge-danger">Chegirma yo'q</span>
                                @else
                                @php
                                 $amount = $item->selling_price - $item->discount_price;
                                 $discount = ($amount/$item->selling_price) * 100;   
                                @endphp
                                <span class="badge badge-pill badge-success">{{round($discount) }} %</span>

                                @endif
                            
                            
                            </td>
                            <td>
                                @if($item->status == 1)
                                <span class="badge badge-pill badge-success">Mavjud</span>
                                @else
                                <span class="badge badge-pill badge-danger">tugadi</span>
                                @endif
                            </td>
                            <td width="20%">
                                <a href="{{route('edit-product', $item->id)}}" title="tahrirlash" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                <a href="{{route('edit-product', $item->id)}}" title="tahrirlash" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{route('product.delete', $item->id)}}" title="o'chirish" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                @if($item->status == 1)
                                <a href="{{route('product.inactive', $item->id)}}" title="o'chirish" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{route('product.active', $item->id)}}" title="o'chirish" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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
                    <h3 class="box-title">category qoshish</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Turkum english <span class="text-danger">*</span></h5>
                            <input type="text" name="category_name_en" class="form-control">
                            @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Turkum uzbek <span class="text-danger">*</span></h5>
                            <input type="text" name="category_name_uz" class="form-control">
                            @error('category_name_uz')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Turkum Iconkasi <span class="text-danger">*</span></h5>
                            <input type="text" name="category_icon" class="form-control">
                            @error('category_icon')
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