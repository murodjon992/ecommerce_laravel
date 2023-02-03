@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img class="card-img-top" style="border-radius: 50%"  src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" width="150" alt="">
                <ul class="list-group">
                    <li><a href="{{route('dashboard')}}" class="btn m-1 btn-primary btn-sm-btn-block">Asosiy sahifa</a></li>
                    <li><a href="{{route('user.profile')}}" class="btn m-1 btn-primary btn-sm-btn-block">Profil yangilash</a></li>
                    <li><a href="{{route('change.password')}}" class="btn m-1 btn-primary btn-sm-btn-block">Parol yangilash</a></li>
                    <li><a href="{{route('user.logout')}}" class="btn m-1 btn-danger btn-sm-btn-block">chiqish</a></li>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <h4 class="text-center"><span class="text-danger">Salom ... {{Auth::user()->name}}</span>  Profilni tahrirlash</h4>
                <div class="card-body">
                    <form method="post" action="{{ route('user.password.update')}}">
                        @csrf
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Amaldagi Parol <span class="text-danger">*</span></label>
                            <input type="password" name="oldpassword" class="form-control unicase-form-control text-input" id="current_password" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Yangi Parol <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"> Parolni Tasdiqlang <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation" >
                        </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-rounded btn-primary">Yangilash</button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
