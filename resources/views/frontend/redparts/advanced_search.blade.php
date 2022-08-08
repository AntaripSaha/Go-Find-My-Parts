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
<form class="block-finder__form" action="{{route('advance.dependent.search')}}"  method="POST">
   @csrf

   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="brand_dependency" id='brand_two'>
                  <option value="0">Select Make</option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
               </select>
            </div>
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="model_two" id="model_two" aria-label="Vehicle Make" disabled="disabled">
               </select>
            </div>
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="year_two" id="year_two" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="style" id="style" aria-label="Vehicle Engine" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="part_category" id="part_category" aria-label="Vehicle Make" disabled="disabled">
               </select>
            </div>
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="part" id="part" aria-label="Vehicle Model" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="fitment" id="fitment" aria-label="Vehicle Engine" disabled="disabled">
               </select>
            </div>
            <button class="block-finder__form-control block-finder__form-control--button" style="backgoruond-color:#72b860 !important; width: 97% !important;" type="submit">Search</button>
         </div>
      </div>

   </div>

   
                     

</form>

<script type="text/javascript">

   $(document).ready(function() {

      // Advance Dependency Search Start
      $("#brand_two").change(function() {
         var brand_id = $(this).val();
         if (brand_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/model')}}/" + brand_id,
                  success: function(res) {
                     if (res) {
                           $("#model_two").empty();
                           $("#model_two").append('<option value="0">Select Model</option>');
                           $.each(res, function(key, value) {
                              $("#model_two").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }

               });
         }
      });
      $('#model_two').change(function() {
         var model_two_id = $(this).val();
         if (model_two_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/year')}}/" + model_two_id,
                  success: function(res) {
                     if (res) {
                           $("#year_two").empty();
                           $("#year_two").append('<option value="0">Select Year</option>');
                           $.each(res, function(key, value) {
                              $("#year_two").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });

      //Advance Dependency Search End




   });

</script> 

