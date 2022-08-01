@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Update Advertisement') }}</h5>
			</div>
			<div class="card-body">
				<form action="#" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{translate('Advertisement')}}" name="model_name"  value="" class="form-control" required>
					</div>
                    <div class="form-group mb-3">
                            <label for="brand">{{translate('Brand')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control aiz-selectpicker" name="brand_id" data-live-search="true" required>
                                
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