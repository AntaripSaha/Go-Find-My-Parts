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
@include('frontend.user.vehicle.vehicle_modal')
@endsection