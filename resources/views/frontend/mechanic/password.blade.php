@extends('frontend.mechanic.layouts.user_panel')

@section('panel_content')
<div class="row gutters-12">
    <div class="col-md-12">
                <div class="  text-white rounded-lg mb-4 overflow-hidden">
                    @if($profile->banner_image != null)
                        <img class="image_banner" src="{{uploaded_asset($profile->banner_image)}}" alt="" >
                    @else
                        <img class="image_banner" src="{{ static_asset('assets/img/mechanic_banner.jpg') }}" alt="" >
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="row gutters-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{ translate('Change Password') }}</h6>
                    </div>
                    @include('frontend.mechanic.pages.password')
                </div>
            </div>
        </div>
@endsection