@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Update Part Category') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route( 'part.categories.update.store', ['id'=>$part_categories->id] ) }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{translate('Car Model')}}" name="name"  value="{{$part_categories->name}}" class="form-control" required>
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