@extends('frontend.mechanic.layouts.user_panel')

@section('panel_content')
<div class="row gutters-12">
    <div class="col-md-12">
        <div class="text-white rounded-lg mb-4 overflow-hidden">
            @if($profile->banner_image != null)
                <img class="image_banner" src="{{uploaded_asset($profile->banner_image)}}" alt="" >
            @else
                <img class="image_banner" src="{{ static_asset('assets/img/mechanic_banner.jpg') }}" alt="" >
            @endif
        </div>
        <div class="profile-card">
            @if($profile->profile_image != null)
                <img class="avatar avatar-md mb-3 mt-2 ml-1" src="{{uploaded_asset($profile->profile_image)}}" alt="" >
            @else
                <img class="avatar avatar-md mb-3 mt-2 ml-1" src="{{ static_asset('assets/img/avatar-place.png') }}" alt="" >
            @endif
            <h4 class="profile-name">{{$profile->user->name}}</h4>
            <h4 class="profile-mail">{{$profile->user->email}}</h4>
        </div>
    </div>
</div>
<div class="row gutters-12">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ translate('Default Information') }}</h6>
            </div>
            @include('frontend.mechanic.pages.information')
        </div>
    </div>
</div>
@endsection
