
<form class="block-finder__form" action="{{route('dependent.search')}}"  method="POST">
   @csrf
   <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="brand" id='brand' aria-label="Vehicle Year" >
                           <option value="0" >Select Make</option>
                           @foreach($brands as $brand)
                           <option value="{{$brand->id}}">{{$brand->name}}</option>
                           
                           @endforeach
                        </select>
                     </div>
                     <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="model" id="model" aria-label="Vehicle Make" disabled="disabled">
                           
                           
                        </select>
                     </div>
                     <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="year" id="year" aria-label="Vehicle Model" disabled="disabled">
                           
                        </select>
                     </div>
                     <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="chassis" id="chassis" aria-label="Vehicle Engine" disabled="disabled">
                          
                        </select>
                     </div>
           
   <button class="block-finder__form-control block-finder__form-control--button" type="submit">Search</button>
</form>

