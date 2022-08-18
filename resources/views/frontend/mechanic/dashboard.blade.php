@extends('frontend.mechanic.layouts.user_panel')

@section('panel_content')
<div class="row gutters-12">
    <div class="col-md-12">
        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            
            @if($profile->banner_image != null)
                <img src="{{uploaded_asset($profile->banner_image)}}" alt="" >
            @else
                <img src="{{ static_asset('assets/img/mechanic_banner.jpg') }}" alt="" >
            @endif
            
        </div>
    </div>
</div>
<div class="row gutters-12">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ translate('Information') }}</h6>
            </div>
            @include('frontend.mechanic.pages.dashboard')
        </div>
    </div>
</div>
@endsection
