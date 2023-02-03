@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                      <div class="col">
                          <form method="post" action="{{ route('admin.profile.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-md-6">						
                                  <div class="form-group">
                                      <h5>Basic Text Input <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="text" name="name" class="form-control" value="{{$editData->name}}" required data-validation-required-message="This field is required"> </div>
                                      <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <h5>Email Field <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="email" value="{{$editData->email}}" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Rasm <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="profile_photo_path" class="form-control" required> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <h5>profil rasmi <span class="text-danger">*</span></h5>
                                <img id="showImage" src="{{(!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg')}}" with="100" height="100" alt="">
                              </div>
                              <div class="col-md-6">
                                <button type="submit" class="btn btn-rounded btn-primary">Yangilash</button>
                              </div>
                            </div>
                          </form>
      
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader()
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
    </script>
@endsection
