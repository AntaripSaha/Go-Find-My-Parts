@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ translate('Models') }}</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_models" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
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
		                        <td>{{$model->name}}</td>
		                        <td>{{$model->model_name}}</td>
		                        <td class="text-right">
                                    <button type="button"  title="{{ translate('Edit') }}" class="btn btn-soft-primary btn-icon btn-circle btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        <i class="las la-edit"></i>
                                    </button>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="#" title="{{ translate('Delete') }}">
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
				<form action="{{route('model.store')}}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{translate('Car Model')}}" name="model_name" class="form-control" required>
					</div>
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
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





@include('backend.product.models.modal')



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
