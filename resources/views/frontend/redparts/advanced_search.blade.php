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
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="model_two" id="model_two" aria-label="Vehicle Make" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
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
      </div>
      
      <div class="row">
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="part_category" id="part_category" aria-label="Part Category" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="parts" id="parts" aria-label="Vehicle Parts" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <div class="block-finder__form-control block-finder__form-control--select" >
               <select name="fitment" id="fitment" disabled="disabled">
               </select>
            </div>
         </div>
         <div class="col-md-3">
            <button class="block-finder__form-control block-finder__form-control--button" id="search_button" disabled="disabled" style="backgoruond-color:#72b860 !important; width:97% !important;" type="submit">Search</button>
         </div>
      </div>
      

   </div>

</form>

<script type="text/javascript">

   $(document).ready(function() {
      

      // Advance Dependency Search Start
      $("#brand_two").change(function() {
         var brand_id = $(this).val();
         document.getElementById("search_button").disabled = true;
         document.getElementById("model_two").disabled = false;
         if (brand_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/model')}}/" + brand_id,
                  success: function(res) {
                     if (res) {
                           $("#model_two").empty();
                           $("#year_two").empty();
                           $("#style").empty();
                           $("#part_category").empty();
                           $("#parts").empty();
                           $("#fitment").empty();
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
         document.getElementById("search_button").disabled = true;
         document.getElementById("year_two").disabled = false;
         if (model_two_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/year')}}/" + model_two_id,
                  success: function(res) {
                     if (res) {
                           $("#style").empty();
                           $("#year_two").empty();
                           $("#part_category").empty();
                           $("#parts").empty();
                           $("#fitment").empty();
                           $("#year_two").append('<option value="0">Select Year</option>');
                           $.each(res, function(key, value) {
                              $("#year_two").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });


      $('#year_two').change(function() {
         var model_two_id = $('#model_two').val();
         var year_two_id = $(this).val();
         document.getElementById("search_button").disabled = true;
         document.getElementById("style").disabled = false;
         if (year_two_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/style')}}/" + model_two_id + '/' + year_two_id,
                  success: function(res) {
                     if (res) {
                           $("#style").empty();
                           $("#part_category").empty();
                           $("#parts").empty();
                           $("#fitment").empty();
                           $("#style").append('<option value="0">Select Style</option>');
                           $.each(res, function(key, value) {
                              $("#style").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });


      $('#style').change(function() {
         var model_two_id = $('#model_two').val();
         var year_two_id = $(this).val();
         document.getElementById("search_button").disabled = true;
         document.getElementById("part_category").disabled = false;
         if (year_two_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/part/category')}}",
                  success: function(res) {
                     if (res) {
                           $("#part_category").empty();
                           $("#parts").empty();
                           $("#fitment").empty();
                           $("#part_category").append('<option value="0">Select Part Category</option>');
                           $.each(res, function(key, value) {
                              $("#part_category").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });
      $('#part_category').change(function() {
         var part_category_id = $('#part_category').val();
         var style_id = $('#style').val();
         document.getElementById("search_button").disabled = true;
         document.getElementById("parts").disabled = false;
         if (part_category_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/parts')}}/"+ part_category_id + '/' + style_id,
                  success: function(res) {
                     if (res) {
                           $("#parts").empty();
                           $("#fitment").empty();
                           $("#parts").append('<option value="0">Select Parts</option>');
                           $.each(res, function(key, value) {
                              $("#parts").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });
      $('#parts').change(function() {
         var parts_id = $('#parts').val();
         document.getElementById("search_button").disabled = true;
         document.getElementById("fitment").disabled = false;
         if (parts_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/advance/fitment')}}/" + parts_id,
                  success: function(res) {
                     if (res) {
                           $("#fitment").empty();
                           $("#fitment").append('<option value="">Select Parts</option>');
                           $.each(res, function(key, value) {
                              $("#fitment").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });
      $('#fitment').change(function() {
         var fitment_value = $("#fitment").val();
         if(fitment_value > 0){
            document.getElementById("search_button").disabled = false;            
         }else{
            document.getElementById("search_button").disabled = true;
         }
      });
      //Advance Dependency Search End
   });

</script> 

