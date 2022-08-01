@extends('backend.layouts.app')

@section('content')
<div class="row">

	<div class="col-lg-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add New Advertise') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('advertise.update.store', ['id'=>$advertise[0]->id]) }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" value="{{$advertise[0]->name}}" name="name" class="form-control" required>
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Logo')}} <small>({{ translate('120x80') }})</small></label>
						<div class="input-group" data-toggle="aizuploader" data-type="image">
							<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
							</div>
							<div class="form-control file-amount">{{ translate('Choose File') }}</div>
							<input type="hidden" name="logo" class="selected-files" value="{{$advertise[0]->image}}">
						</div>
						<div class="file-preview box sm">
						</div>
					</div>
					<div class="form-group mb-3">
						<label for="section">{{translate('Select Section')}}</label>
                        <select class="form-control" name="section">
                            @if( $advertise[0]->section == 0 )
                                <option value="0" selected>Upper Section</option>
                                <option value="1">Lower Section</option>
                            @else
                                <option value="0" >Upper Section</option>
                                <option value="1" selected>Lower Section</option>
                                
                            @endif
                        </select>
					</div>
					<div class="form-group mb-3">
						<label for="url">{{translate('URL')}}</label>
                        <input type="text" name="url" class="form-control" placeholder="Enter Url of Advertised Product" value="{{$advertise[0]->url}}" required>
					</div>
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection