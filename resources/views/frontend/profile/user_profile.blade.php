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
                    <form action="{{route('user.profile.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control unicase-form-control text-input" value="{{Auth::user()->name}}" id="name" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{Auth::user()->email}}" id="email" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Telefon <span>*</span></label>
                            <input type="text" name="phone" class="form-control unicase-form-control text-input" value="{{Auth::user()->phone}}" id="phone" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Rasmi <span>*</span></label>
                            <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input" id="profile_photo_path" >
                        </div>
                        <div class="form-group"><button class="btn btn-info" type="submit">Yangilash</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
