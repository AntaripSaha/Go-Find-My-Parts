<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Car Model</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{route('model.update')}}" method="POST">
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
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>