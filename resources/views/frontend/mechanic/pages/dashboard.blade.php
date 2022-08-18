
<div class="card-body">
    <div class="bg-white rounded shadow-sm mb-4">
            <div class="p-1">
                <div class="fs-15 fw-600 p-1">
                    Personal Information
                </div>
                <div class="p-3" style="background: rgb(247 248 250); border: 1.5px solid rgb(235 235 235);">
                    <div class="form-group" >
                        <label class=" fw-500" style="font-size: 14px;">{{ translate('Name')}}:&nbsp; {{$profile->user->name}}</label>
                     </div>
                     <div class="form-group">
                        <label class=" fw-500" style="font-size: 14px;">{{ translate('Contact')}}:&nbsp; {{$profile->contact}}</label>
                     </div>
                     <div class="form-group">
                        <label class=" fw-500" style="font-size: 14px;">{{ translate('Brands')}}:&nbsp;</label>
                        
                            {{ implode(", ",$profile->my_brand_names) }}
                        
                     </div>
                </div>
                <div class="fs-15 fw-600 p-2">
                    Address
                </div>
                <div class="p-3" style="background: rgb(247 248 250); border: 1.5px solid rgb(235 235 235); ">
                    <div class="form-group">
                        <p style="font-size: 14px;" class="fw-500">
                            {{$profile->address}}. {{$profile->address_two}}. {{$profile->city}}.{{$profile->country}}
                        </p>
                     </div>
                </div>
                <div class="fs-15 fw-600 p-2">
                    Description
                </div>
                <div class="p-3" style="background: rgb(247 248 250); border: 1.5px solid rgb(235 235 235); ">
                    <div class="form-group">
                        <p style="font-size: 14px;" class="fw-500">
                            {{$profile->description}}
                        </p>
                     </div>
                </div>
                {{-- <div class="form-group">
                    <label>{{ translate('Brands')}}</label>
                    <select class="select2 form-control aiz-selectpicker" name="brands[]" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" data-selected="{{json_encode($profile->my_brands)}}" multiple>
                        @foreach ($all_brands as $brand)
                            <option value="{{ $brand->id }}" {{in_array($brand->id,$profile->my_brands) ? 'selected' : ''}}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
    </div>
</div>