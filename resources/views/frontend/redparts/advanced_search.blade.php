<style>
   .search-button{
    /* border-top-right-radius: 30px !important;
    border: none;
    padding: 0px 40px;
    height: 30px !important;
    transition: background 0.2s, color 0.2s;
    background-color: #72b860;
    color: #fff;
    border-bottom-right-radius: 30px !important; 
   */

   }
   .make-new{
      /* border-top-left-radius: 30px !important;
      height: 60px !important;
      border-bottom-left-radius: 30px !important;
      background-color: #fff;
      background-repeat: no-repeat;
      text-align: left; */
   }
</style>
<form class="block-finder__form" action="{{route('dependent.search')}}"  method="POST">
   @csrf

   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="brand_dependency" id='brand' aria-label="Vehicle Year" >
                  <option value="0">Select Make</option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
               </select>
            </div>
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="model" id="model" aria-label="Vehicle Make" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="year" id="year" aria-label="Vehicle Model" disabled="disabled">
               </select>
            </div>
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="chassis" id="chassis" aria-label="Vehicle Engine" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="model" id="model" aria-label="Vehicle Make" disabled="disabled">
               </select>
            </div>
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="year" id="year" aria-label="Vehicle Model" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="chassis" id="chassis" aria-label="Vehicle Engine" disabled="disabled">
               </select>
            </div>
            <button class="block-finder__form-control block-finder__form-control--button" style="backgoruond-color:#72b860 !important; width: 97% !important;" type="submit">Search</button>
         </div>
      </div>

   </div>

   
                     

</form>

<script type="text/javascript">
// $(document).ready(function() {


//    $('make').style.borderBottomLeftRadius = "30px";


// });
</script>

