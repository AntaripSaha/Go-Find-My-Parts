@extends('frontend.mechanic.layouts.user_panel')

@section('panel_content')
<div class="card">
    <div class="card-header">
        <h6 class="mb-0">{{ translate('Change Password') }}</h6>
    </div>
    <div class="card-body">
        @include('frontend.mechanic.pages.password')
    </div>
</div>



@endsection