@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ translate('Years') }}</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_models" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Year & Enter') }}">
						</div>
					</form>
				</div>
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>{{translate('Brand')}}</th>
		                    <th>{{translate('Model')}}</th>
		                    <th>{{translate('Year')}}</th>
		                    <th class="text-right">{{translate('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($models as $model)
		                    <tr>
                                <td>{{$i}}</td>
		                        <td>{{$model->brands->name}}</td>
		                        <td>{{$model->models->model_name}}</td>
		                        <td>{{$model->year}}</td>
		                        <td class="text-right">
                                    {{-- <a href="#"  title="{{ translate('Edit') }}" class="btn btn-soft-primary btn-icon btn-circle btn-sm">
                                        <i class="las la-edit"></i>
                                    </a> --}}
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('year.delete', ['id'=>$model->id])}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
		                    </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                    {{ $models->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add Car Model') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{route('year.store')}}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="brand">{{translate('Brand')}} <span class="text-danger">*</span></label>
						<div class="">
							<select class="form-control aiz-selectpicker" name="brand_id" data-live-search="true" required>
							@foreach($brands as $brand)
								<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="form-group mb-3">
						<label for="brand">{{translate('Model')}} <span class="text-danger">*</span></label>
						<div class="">
							<select class="form-control aiz-selectpicker" name="model_id" data-live-search="true" required>
							@foreach($models as $model)
								<option value="{{$model->id}}">{{$model->model_name}}</option>
							@endforeach
							</select>
						</div>
					</div>
                    <div class="form-group mb-3">
                            <label for="brand">{{translate('Year')}} <span class="text-danger">*</span></label>
                            <div class="">
                                <select class="form-control aiz-selectpicker" name="year" data-live-search="true" required>
                                @foreach($years as $year)
                                    <option value="{{$year->year}}">{{$year->year}}</option>
                                @endforeach
                                </select>
                            </div>
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

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">
    function sort_models(el){
        $('#sort_models').submit();
    }
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
