@extends('backend.layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-8 mx-auto">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Update Part Category') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route( 'parts.update.store', ['id'=>$parts->id] ) }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="model_name">{{translate('Part')}}</label>
						<input type="text" placeholder="{{translate('Parts Name')}}" name="name" value="{{$parts->name}}" class="form-control" required>
					</div>
                    <div class="form-group mb-3">
                        <label for="category">{{translate('Part Category')}} <span class="text-danger">*</span></label>
                        <div class="">
                            <select class="form-control aiz-selectpicker" name="part_category_id" data-live-search="true" required>
                                @foreach($partCategories as $category)
                                    @if($category->id == $parts->partCategories->id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">{{translate('Styles')}} <span class="text-danger">*</span></label>
                        <div class="">
                            <select class="form-control aiz-selectpicker" name="style_id" data-live-search="true" required>
                            @foreach($styles as $style)
                                @if($style->id == $parts->styles->id)
                                    <option value="{{$style->id}}" selected>{{$style->style}}</option>
                                @else
                                    <option value="{{$style->id}}">{{$style->style}}</option>
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