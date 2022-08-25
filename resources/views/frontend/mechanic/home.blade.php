@extends('frontend.layouts.app')

@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('Register Your Store')}}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('shops.create') }}">"{{ translate('Register your shop')}}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <form action="{{route('mechanic.profile.update', ['mechanic'=>$profile->id])}}" method="POST" enctype="multipart/form-data" >
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="bg-white rounded shadow-sm mb-4">
                        <div class="fs-15 fw-600 p-3 border-bottom">
                            {{ translate('Basic Info')}}
                        </div>


                        <div class="p-3">
                            <div class="form-group">
                                <label for="banner_image">{{translate('Banner Image')}}</label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner_image" class="selected-files" value="{{$profile->banner_image}}">
                                </div>
                                <div class="file-preview box sm">
                                     
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile_picture">{{translate('Profile Picture')}}</label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="profile_image" class="selected-files" value="{{$profile->profile_image}}">
                                </div>
                                <div class="file-preview box sm">
                                     
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ translate('Mechanic Name')}} <span class="text-primary">*</span></label>
                                <input type="text" class="form-control" placeholder="{{ translate('Mechanic Name')}}" name="name" value="{{$profile->user->name}}" required>
                            </div>
                            <div class="form-group">
                                <label>{{ translate('Contact')}} <span class="text-primary">*</span></label>
                                <input type="text" name="contact" value="{{$profile->contact}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{{ translate('Brands')}} <span class="text-primary">*</span></label>
                                <select class="select2 form-control aiz-selectpicker" name="brands[]" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" data-selected="{{json_encode($profile->my_brands)}}" multiple>
                                    @foreach ($all_brands as $brand)
                                        <option value="{{ $brand->id }}" {{in_array($brand->id,$profile->my_brands) ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fs-15 fw-600 p-3 border-bottom">
                                Address
                            </div>
                            <div class="p-3" style="background: rgb(226 227 227)">
                                <div class="form-group">
                                    <label for="address_one">Primary Address<span class="text-primary">*</span></label>
                                    <input type="text" name="address_one" class="form-control" value="{{$profile->address}}" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Secondary Address')}}</label>
                                    <input type="text" name="address_two" value="{{$profile->address_two}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('City')}} <span class="text-primary">*</span></label>
                                    <input type="text" name="city" value="{{$profile->city}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>{{ translate('Country')}} <span class="text-primary">*</span></label>
                                    <input type="text" name="country" value="{{$profile->country}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>{{ translate('Short Description')}} <span class="text-primary">*</span></label>
                                <textarea class="form-control" name="description" id="" cols="20" rows="10" required>{{$profile->description}}</textarea>
                            </div>
                        </div>

                        
                    </div>

                    @if(get_setting('google_recaptcha') == 1)
                        <div class="form-group mt-2 mx-auto row">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                        </div>
                    @endif

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Register Your Shop')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    // making the CAPTCHA  a required field for form submission
    $(document).ready(function(){
        // alert('helloman');
        $("#shop").on("submit", function(evt)
        {
            var response = grecaptcha.getResponse();
            if(response.length == 0)
            {
            //reCaptcha not verified
                alert("please verify you are humann!");
                evt.preventDefault();
                return false;
            }
            //captcha verified
            //do the rest of your validations here
            $("#reg-form").submit();
        });
    });
</script>
@endsection
