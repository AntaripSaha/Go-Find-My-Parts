@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Update Car Model') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route( 'model.update.store', ['id'=>$model[0]->id] ) }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{translate('Car Model')}}" name="model_name"  value="{{$model[0]->model_name}}" class="form-control" required>
					</div>
                    <div class="form-group mb-3">
                            <label for="brand">{{translate('Brand')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control aiz-selectpicker" name="brand_id" data-live-search="true" required>
                                @foreach($brands as $brand)
									@if($model[0]->brand_id == $brand->id)
										<option value="{{$brand->id}}" selected>{{$brand->name}}</option>
									@else
										<option value="{{$brand->id}}">{{$brand->name}}</option>
									@endif
                                @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group mb-3">
                            <label for="year">{{translate('Year')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control aiz-selectpicker" name="year_id" data-live-search="true" required>
                                @foreach($years as $year)
									@if($model[0]->year_id == $year->id)
										<option value="{{$year->id}}" selected>{{$year->year}}</option>
									@else
										<option value="{{$year->id}}">{{$year->year}}</option>
									@endif
                                @endforeach
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