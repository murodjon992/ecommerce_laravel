@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
        <div class="box-header">
            <h5>Brandlarni tahrirlash</h5>
        </div>
        <div class="box-body">
        <div class="col-4">
            <form action="{{route('brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$brand->id}}">
                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                <div class="from-group">
                    <h4>Inglizcha nomi</h4>
                    <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                </div>
                <div class="from-group mt-4">
                    <h4>O'zbekcha nomi</h4>
                    <input type="text" name="brand_name_uz" class="form-control" value="{{$brand->brand_name_uz}}">
                </div>
                <div class="from-group mt-4">
                    <h4>Rasmi</h4>
                    <input type="file" name="brand_image" class="form-control" >
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success" type="submit">Yangilash</button>
                </div>
            </form>
        </div>
        </div>
        </div>
    </div>
</section>
</div>
@endsection