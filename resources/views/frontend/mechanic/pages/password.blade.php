<form action="{{route('mechanic.password.update')}}" method="POST" enctype="multipart/form-data">
    <input name="_method" type="hidden" value="POST">
    @csrf
    <!-- Basic Info-->
    <div class="card">
        <div class="card-header">
            {{-- <h5 class="mb-0 h6">{{ translate('Basic Info')}}</h5> --}}
        </div>
        <div class="card-body">
           

            <div class="form-group row">
                <label class="col-md-2 col-form-label">{{ translate('Your Password') }}</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" placeholder="{{ translate('New Password') }}" name="new_password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">{{ translate('Confirm Password') }}</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" placeholder="{{ translate('Confirm Password') }}" name="confirm_password">
                </div>
            </div>

        </div>
    </div>



    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-primary">{{translate('Update Profile')}}</button>
    </div>
</form>