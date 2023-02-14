@extends('frontend.layouts.user_panel')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3">{{ translate('Vehicle List') }}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto mb-3">
            <div class="p-3 rounded mb-3 c-pointer text-center bg-white shadow-sm hov-shadow-lg has-transition"
                data-toggle="modal" data-target="#ticket_modal">
                <span
                    class="size-70px rounded-circle mx-auto bg-secondary d-flex align-items-center justify-content-center mb-3">
                    <i class="las la-plus la-3x text-white"></i>
                </span>
                <div class="fs-20 text-primary">{{ translate('Add Vehicle') }}</div>

            </div>
        </div>
    </div>

    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Vehicle List') }}</h5>
            <div>
                @include('frontend.user.vehicle.default_vehicle')
            </div>

        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th data-breakpoints="lg">{{ translate('S/L') }}</th>
                        <th data-breakpoints="lg">{{ translate('Model') }}</th>
                        <th>{{ translate('Brand') }}</th>
                        <th data-breakpoints="lg">{{ translate('Year') }}</th>
                        <th>{{ translate('Default') }}</th>
                        <th>{{ translate('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($vehicles as $key => $vehicle)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $vehicle->model->model_name }}</td>
                            <td>{{ $vehicle->brand->name }}</td>
                            <td>{{ $vehicle->year->year }}</td>
                            <td>
                                @if ($vehicle->default_vehicle == 1)
                                    <p class="badge badge-inline badge-success">Yes</p>
                                @else
                                    <p class="badge badge-inline badge-danger">No</p>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                    data-href="{{ route('vehicle_list.delete', $vehicle->id) }}"
                                    title="{{ translate('Delete') }}">
                                    <i class="las la-trash mt-1"></i>
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
                {{-- {{ $tickets->links() }} --}}
            </div>
        </div>
    </div>
@endsection
@include('modals.delete_modal')
@section('modal')
    <div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title strong-600 heading-5">{{ translate('Add Your Vehicle') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-3 pt-3">
                    <form class="" action="{{ route('vehicle_list.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label>{{ translate('Brand') }}</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="vehicle_brand" id='vehicle_brand'
                                    aria-label="Vehicle Year">
                                    <option value="0">Select Make</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label>{{ translate('Model') }}</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="vehicle_model" id="vehicle_model"
                                    aria-label="Vehicle Make" disabled="disabled">

                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label>{{ translate('Year') }}</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="vehicle_year" id="vehicle_year" aria-label="Vehicle Make"
                                    disabled="disabled">

                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label>{{ translate('Chassis') }}</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="vehicle_chassis" id="vehicle_chassis"
                                    aria-label="Vehicle Make" disabled="disabled">

                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label>{{ translate('Default Vehicle') }}</label>
                            </div>
                            <div class="col-md-10">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="defaultVehicle" value="1"
                                            checked>Default Vehicle
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="defaultVehicle"
                                            value="0">Secondary Vehicle
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-4">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ translate('cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ translate('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    $(document).ready(function() {
        // Dependency Search Start
        $("#vehicle_brand").change(function() {
            var brand_id = $(this).val();
            document.getElementById("vehicle_model").disabled = false;
            if (brand_id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('/model') }}/" + brand_id,
                    success: function(res) {
                        if (res) {
                            $("#vehicle_model").empty();
                            $("#vehicle_model").append(
                                '<option value="0">Select Model</option>');
                            $.each(res, function(key, value) {
                                $("#vehicle_model").append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    }
                });
            }
        });
        $('#vehicle_model').change(function() {
            var model_id = $(this).val();
            document.getElementById("vehicle_year").disabled = false;
            if (model_id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('/year') }}/" + model_id,
                    success: function(res) {
                        if (res) {
                            $("#vehicle_year").empty();
                            $("#vehicle_year").append(
                                '<option value="0">Select Year</option>');
                            $.each(res, function(key, value) {
                                $("#vehicle_year").append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    }
                });
            }
        });
        $('#vehicle_year').change(function() {
            var year_id = $(this).val();
            var model_id = $('#vehicle_model').val();
            document.getElementById("vehicle_chassis").disabled = false;
            if (year_id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('/chassis') }}/" + year_id + '/' + model_id,
                    success: function(res) {
                        if (res) {
                            $("#vehicle_chassis").empty();
                            $("#vehicle_chassis").append(
                                '<option value="0">Select Chassis</option>');
                            $.each(res, function(key, value) {
                                $("#vehicle_chassis").append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        }
                    }
                });
            }
        });
        // Dependency Search End
    });
</script>
