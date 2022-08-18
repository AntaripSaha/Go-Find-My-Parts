@extends('frontend.mechanic.layouts.public.user_panel')

@section('panel_content')
<div class="row gutters-12">
    <div class="col-md-12">
        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            <img src="{{uploaded_asset($profile->banner_image)}}" alt="" >
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
