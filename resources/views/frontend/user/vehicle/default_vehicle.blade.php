 <div class="dropdown">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
         @if ($default_vehicle)
             {{ $default_vehicle->brand->name }}
             {{ $default_vehicle->model->model_name }}
         @else
             Default Vehicle
         @endif

     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         @foreach ($vehicles as $key => $vehicle)
             <a class="dropdown-item"
                 href="{{ route('vehicle_list.default', $vehicle->id) }}">{{ $vehicle->brand->name }}
                 {{ $vehicle->model->model_name }}</a>
         @endforeach
     </div>
 </div>
