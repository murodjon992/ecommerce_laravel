@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <div class="content">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                      <div class="col">
                          <form method="post" action="{{ route('update.change.password')}}">
                            @csrf
                            <div class="row">
                              <div class="col-md-6">						
                                  <div class="form-group">
                                      <h5>Amaldagi parol <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="password" id="current_password" name="oldpassword" class="form-control"  required data-validation-required-message="This field is required"> </div>
                                      <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                  </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-md-6">						
                                  <div class="form-group">
                                      <h5>Yangi parol <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="password" id="password" name="password" class="form-control"  required data-validation-required-message="This field is required"> </div>
                                      <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                  </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-md-6">						
                                  <div class="form-group">
                                      <h5>Parolni tasdiqlang <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"  required data-validation-required-message="This field is required"> </div>
                                      <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                  </div>
                              </div>
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
   
@endsection
