@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3">{{translate('All Advertisements')}}</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ translate('Advertisements') }}</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_advertise" action="" method="GET">
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
		                    <th>{{translate('Name')}}</th>
		                    <th>{{translate('Banner')}}</th>
		                    <th>{{translate('Section')}}</th>
		                    <th class="text-right">{{translate('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
                        @php
                         $i = 1;
                        @endphp
                        @foreach($advertises as $advertise)
		                    <tr>
		                        <td>{{$i}}</td>
		                        <td>{{$advertise->name}}</td>
		                        <td>
                                    <img src="{{ uploaded_asset($advertise->image) }}" alt="" height="50px" width="auto">
                                </td>
                                @if($advertise->section == 0)
		                        <td>Upper Section</td>
                                @else
		                        <td>Lower Section</td>
                                @endif
		                        <td class="text-right">
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('advertise.update', ['id'=>$advertise->id])}}">
		                                <i class="las la-edit"></i>
		                            </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="" title="{{ translate('Delete') }}">
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
                	{{ $advertises->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>




	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add New Advertise') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('advertise.store') }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{translate('Name')}}" name="name" class="form-control" required>
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Logo')}} <small>({{ translate('120x80') }})</small></label>
						<div class="input-group" data-toggle="aizuploader" data-type="image">
							<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
							</div>
							<div class="form-control file-amount">{{ translate('Choose File') }}</div>
							<input type="hidden" name="logo" class="selected-files">
						</div>
						<div class="file-preview box sm">
						</div>
					</div>
					<div class="form-group mb-3">
						<label for="section">{{translate('Select Section')}}</label>
                        <select class="form-control" name="section">
                            <option value="0">Upper Section</option>
                            <option value="1">Lower Section</option>
                        </select>
					</div>
					<div class="form-group mb-3">
						<label for="url">{{translate('URL')}}</label>
                        <input type="text" name="url" class="form-control" placeholder="Enter Url of Advertised Product" value="#" required>
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
    function sort_advertise(el){
        $('#sort_advertise').submit();
    }
</script>
@endsection
