@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ translate('Part Categories') }}</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_category" action="" method="GET">
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
                            <th>{{translate('Category')}}</th>
		                    <th class="text-right">{{translate('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
						@php
						$i = 1;
						@endphp
						@foreach($part_categories as $part_category)
		                    <tr>
                                <td>{{$i}}</td>
		                        <td>{{$part_category->name}}</td>
		                        <td class="text-right">
                                    <a href="{{route('part.categories.update', ['id'=>$part_category->id])}}"  title="{{ translate('Edit') }}" class="btn btn-soft-primary btn-icon btn-circle btn-sm">
                                        <i class="las la-edit"></i>
                                    </a>
		                            {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="#" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a> --}}
		                        </td>
		                    </tr>
							@php
							$i++;
							@endphp

						@endforeach
                       
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                    {{ $part_categories->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>

	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add Part Category') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{route('part.categories.store')}}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Part Category')}}</label>
						<input type="text" placeholder="{{translate('Category Name')}}" name="part_category" class="form-control" required>
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
        $('#sort_category').submit();
    }
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

@endsection
