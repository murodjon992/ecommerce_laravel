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
            <form action="{{route('subcategory.update',$subcategory->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$subcategory->id}}">
                <div class="from-group">
                    <h4>Inglizcha nomi</h4>
                    <input type="text" name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}">
                </div>
                <div class="from-group mt-4">
                    <h4>O'zbekcha nomi</h4>
                    <input type="text" name="subcategory_name_uz" class="form-control" value="{{$subcategory->subcategory_name_uz}}">
                </div>
                <div class="from-group mt-4">
                    <h5>Turkumni tanlang</h5>
                        <div class="controls">
                            <select name="category_id" class="form-control" id="select">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                        
                                    @endforeach
                            </select>
                        </div>
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