
<div class="card-body">
    <div class="bg-white rounded shadow-sm mb-4">
        <div class="fs-15 fw-600 p-3 border-bottom">
            {{ translate('Basic Info')}}
        </div>
        <form action="{{route('mechanic.profile.update', ['mechanic'=>$profile->id])}}" method="POST" enctype="multipart/form-data" >
            {{ method_field('PUT') }}
            {{ csrf_field() }}

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
                        
                            {{-- @foreach ($brands as $brand) 
                                <option value="{{ $brand }}" selected>{{ $brand }}</option>
                            @endforeach --}}
                        
                            @foreach ($all_brands as $brand)
                                <option value="{{ $brand->id }}" {{in_array($brand->id,$profile->my_brands) ? 'selected' : ''}}>{{ $brand->name }}</option>
                            @endforeach
                        
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>{{ translate('Address')}} <span class="text-primary">*</span></label>
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
                <div class="form-group">
                    <label>{{ translate('Short Description')}} <span class="text-primary">*</span></label>
                    <textarea class="form-control" name="description" id="" cols="20" rows="10" required>{{$profile->description}}</textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary fw-600">Update</button>
            </div>
        </form>
    </div>
</div>