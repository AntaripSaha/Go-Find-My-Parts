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
