@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Update Car Style') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route( 'style.update.store', ['id'=>$styles->id] ) }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Name')}} <span class="text-danger">*</span></label>
						<input type="text" placeholder="{{translate('Car Style')}}" name="style"  value="{{$styles->style}}" class="form-control" required>
					</div>
                    <div class="form-group mb-3">
                            <label for="brand">{{translate('Brand')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control aiz-selectpicker" name="brand_id" data-live-search="true" required>
                                @foreach($brands as $brand)
									@if($styles->brand_id == $brand->id)
										<option value="{{$brand->id}}" selected>{{$brand->name}}</option>
									@else
										<option value="{{$brand->id}}">{{$brand->name}}</option>
									@endif
                                @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group mb-3">
                            <label for="brand">{{translate('Model')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control aiz-selectpicker" name="model_id" data-live-search="true" required>
                                @foreach($models as $model)
									@if($styles->model_id == $model->id)
										<option value="{{$model->id}}" selected>{{$model->model_name}}</option>
									@else
										<option value="{{$model->id}}">{{$model->model_name}}</option>
									@endif
                                @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group mb-3">
                            <label for="year">{{translate('Year')}} <span class="text-danger">*</span></label>
                            <div class="">
                                {{-- @foreach($years as $year)
									@if($styles->year_id == $year->id)
										<option value="{{$year->id}}" selected>{{$year->year}}</option>
									@else
										<option value="{{$year->id}}">{{$year->year}}</option>
									@endif
                                @endforeach --}}
								<select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="year_id" required>

								</select>
                                </select>
                            </div>
                    </div>
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">{{translate('Update')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection