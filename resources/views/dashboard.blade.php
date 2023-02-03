@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div style="margin: 15px 0;">
                <img class="mt-2" style="border-radius: 50%"  src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" width="150" alt="">
            </div>
                <ul class="list-group">
                    <li style="margin-bottom: 10px"><a href="" class="btn m-1 btn-primary btn-sm-btn-block">Asosiy sahifa</a></li>
                    <li style="margin-bottom: 10px"><a href="{{route('user.profile')}}" class="btn m-1 btn-primary btn-sm-btn-block">Profil yangilash</a></li>
                    <li style="margin-bottom: 10px"><a href="{{route('change.password')}}" class="btn m-1 btn-primary btn-sm-btn-block">Parol yangilash</a></li>
                    <li style="margin-bottom: 10px"><a href="{{route('user.logout')}}" class="btn m-1 btn-danger btn-sm-btn-block">chiqish</a></li>
                </ul>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <h4 class="text-center"><span class="text-danger">Salom ... {{Auth::user()->name}}</span></h4>
            </div>
        </div>
    </div>
</div>
@endsection