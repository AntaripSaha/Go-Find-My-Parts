@extends('frontend.layouts.new_app')
@section('content')

<style>

   .basic-btn {
      margin: 7px !important;
   }

   .advance-btn {
      margin: 0px !important;
   }

   .make-new{
         border-top-left-radius: 30px !important;
         height: 60px !important;
         border-bottom-left-radius: 30px !important;
      }
   .service{
      background: #e6e6e6;
      content: "";
      width: 61px;
      height: 61px;
      display: inline-block;
      border-radius: 100%;
   }
   .service:hover{
      background: #b2b7b8;
      content: "";
      width: 61px;
      height: 61px;
      display: inline-block;
      border-radius: 100%;
   }
   .service-image{
      position: relative;
      width: 70% !important;
      margin-left: 12px;
      margin-top: 6px;
      top: 0;
      transition: top 320ms;
   }
   .service-image:hover{
      top: -8px;
      margin-left: 12px;
      margin-top: 8px;
   }
   .service-p{
      color: #999999;
      display: block;
      font-size: 14px;
      line-height: 18px;
      margin-left: 85px;
   }
   .service-titile{
      font-size: 15px;
      font-weight: 400;
      margin-left: 85px;
      margin-top: -60px;
   }
   .service-titile:hover{
      color: #1f1fda;
      font-size: 15px;
      font-weight: 400;
      margin-left: 85px;
      margin-top: -60px;
   }
   .btn-background{
      background: rgb(0 0 0 / 59%);
   }
   .footer-page-mobile{
      display: none;
   }
   .footer-btn-mb{
      display: none;
   }
@media only screen and (min-width: 360px) and (max-width: 800px){
   .footer-btn-mb{
      display: block;
   }
   .footer-page-mobile{
      display: block;
   }
   .footer-button-mobile{
      margin-left: 24%;
      margin-top: -2%;
   }

   .footer-button-mobile-first{
      margin-left: 10%;
    margin-top: -1%;
   }
   .footer-font-mobile{
      font-size: 12px !imprtant;
   }
   .footer-page-desktop{
      display: none;
   }
      .service-p{
         color: #999999;
         display: block;
         font-size: 10px;
         line-height: 17px;
         margin-left: 70px;
      }
      .service-titile{
         font-size: 13px;
         font-weight: 400;
         margin-left: 70px;
         margin-top: -60px;
      }
      .mobile-view{
         height: 0px !important;
      }
      .mobile-view-add-two{
         height: 25px !important;
      }
      /* .advance-search{
      width: 75%;
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
   }
   .basic-btn{
      position: absolute;
      width: 33% !important;
      font-size: 11px !important;
      margin-left: 13% !important;
   }
   .advance-btn{
      width: 83% !important;
      font-size: 11px !important;
      margin-left: 100% !important;;
   } */
   .btn-background{
      background: none;
   }

.btn_dev {
   width: 74.5% !important;
   margin-left: 39.5px !important;
   margin-bottom: 10px !important;
   text-align: center !important;
}
.sub_btn_dev {
   width: 74.5% !important;
   margin-left: 12% !important;
   margin-bottom: 10px !important;
   text-align: center !important;
}


.basic-btn {
   width: 90%;
}

.advance-btn {
   width: 90%;
}
.mobile-view-product{
   margin-top:-6% !important;
}
.mobile-view-testimonial{
   margin-top:-2% !important;
}
.mobile-view-testimonial-bottom{
   margin-bottom:2% !important;
}

}
@media only screen and (min-width: 375px) and (max-width: 480px){
   .btn_dev {
      width: 75.2% !important;
      margin-left: 40.1px !important;
      margin-bottom: 10px !important;
      text-align: center !important;
   }
}
@media only screen and (min-width: 390px) and (max-width: 480px){
   .btn_dev {
      width: 75.5% !important;
      margin-left: 41.5px !important;
      margin-bottom: 10px !important;
      text-align: center !important;
   }
}
@media only screen and (min-width: 400px) and (max-width: 480px){
   .btn_dev {
      width: 76.1% !important;
      margin-left: 43px !important;
      margin-bottom: 10px !important;
      text-align: center !important;
   }
}
@media only screen and (min-width: 414px) and (max-width: 480px){
   .btn_dev {
      width: 76.2% !important;
      margin-left: 42.1px !important;
      margin-bottom: 10px !important;
      text-align: center !important;
   }
}
@media only screen and (min-width: 700px) and (max-width: 1200px){
   .btn_dev {
      width: 76.2% !important;
      margin-left: 42.1px !important;
      margin-bottom: 10px !important;
      text-align: center !important;
   }
}

.desktop-view{
   margin-top: 1%;
}

</style>
<link rel="stylesheet" href="{{static_asset('assets/css/w3.css')}}">

<body>
      <!-- site -->
      <div class="site">
         <!-- site__header / end --><!-- site__body -->
         <div class="site__body">
            <div class="block-finder block">
               <div class="decor block-finder__decor decor--type--bottom">
                  <div class="decor__body">
                     <div class="decor__start"></div>
                     <div class="decor__end"></div>
                     <div class="decor__center"></div>
                  </div>
               </div>
               <div class="block-finder__image" style="background-image: url('{{static_asset('assets/frontend/images/finder-1903x500.jpg') }}' );"></div>
               


               <div class="block-finder__body container container--max--xl">
                  <div class="block-finder__title">Find Parts For Your Vehicle</div>
                  <div class="block-finder__subtitle">Over hundreds of brands and tens of thousands of parts</div>
                  <div class="btn_dev text-left ml-2 mt-2" style="width: 45%;">
                        <button class="tablink block-finder__form-control block-finder__form-control--button basic-btn w3-yellow w3-web-blue" onclick="openCity(event,'Basic')">Basic</button>
                        <button class="tablink  block-finder__form-control block-finder__form-control--button advance-btn w3-yellow" onclick="openCity(event,'Advance')" style="padding-right: 24px;padding-left: 23px;">Interchangeable</button>
                     </div>
                   <div id="Basic" class="w3-container city">
                     @include('frontend.redparts.search')
                   </div>
                   <div id="Advance" class="w3-container city" style="display:none">
                     @include('frontend.redparts.advanced_search')
                   </div>
               </div>




            </div>
            <div class="mobile-view" style="height:15px"></div>
          
 
               <div class="container">
                     <div class="ser-up owl-carousel owl-theme mt-3">
                        <div class="item">
                           <div>
                              <div class="block-features__item-icon service" >
                                 <img src="{{static_asset('assets/frontend/images/service/ico-1.png') }}" alt="" height="48px" width="48px" class="service-image">
                              </div>
                              <div class="block-features__item-info">
                                 <div class="block-features__item-title service-titile">Break Pads</div>
                                 <p class="service-p" style="white-space: nowrap;">Get trusted stopping <br> power</p>
                              </div>
                           </div>
                        </div>
                        <div class="item" >
                              <div class="block-features__item-icon service">
                                 <img src="{{static_asset('assets/frontend/images/service/ico-2.png') }}" alt=""  height="48px" width="48px" class="service-image">
                              </div>
                              <div class="block-features__item-info">
                                 <div class="block-features__item-title service-titile">Car Bulbs</div>
                                 <p class="service-p" style="white-space: nowrap;">Increased light output <br> & extended life</p>
                              </div>

                        </div>
                        <div class="item">

                              <div class="block-features__item-icon service">
                                 <img src="{{static_asset('assets/frontend/images/service/ico-3.png') }}" alt=""  height="48px" width="48px" class="service-image">
                              </div>
                              <div class="block-features__item-info">
                                 <div class="block-features__item-title service-titile">Air Filters</div>
                                 <p class="service-p" style="white-space: nowrap;">Maximize engine <br> performance</p>
                              </div>

                        </div>
                        <div class="item">

                              <div class="block-features__item-icon service">
                                 <img src="{{static_asset('assets/frontend/images/service/ico-4.png') }}" alt=""  height="48px" width="48px" class="service-image">
                              </div>
                              <div class="block-features__item-info">
                                 <div class="block-features__item-title service-titile">Motor Oils</div>
                                 <p class="service-p" style="white-space: nowrap;">Premium quality oil for <br> your engine</p>
                              </div>

                        </div>
                        <div class="item">

                              <div class="block-features__item-icon service">
                                 <img src="{{static_asset('assets/frontend/images/service/ico-5.png') }}" alt=""  height="48px" width="48px" class="service-image">
                              </div>
                              <div class="block-features__item-info">
                                 <div class="block-features__item-title service-titile">Spark Plugs</div>
                                 <p class="service-p" style="white-space: nowrap;">Maintain engine <br> efficiency</p>
                              </div>

                        </div>
               </div>
 
               
            <!--------------owl-carousel Advertise Upper Section Start------------>
            <div class="mobile-view" style="height:15px"></div>
            <div class="desktop-view"></div>

            @include('frontend.redparts.advertise_one')

            <!--------------owl-carousel Advertise Upper Section End ------------>


            <div class="mobile-view" style="height:15px"></div>
            <div class="desktop-view"></div>

            <!-------------- Featured Product Section Start------------->
               @include('frontend.redparts.featured')
            <!-------------- Featured Product Section End------------->

            <div class="static-ads" style="height:15px !important;"></div>

            <div class="mobile-view-product"></div>
            <!-------------- Product Section Start------------->
               @include('frontend.redparts.product')
            <!-------------- Product Section End------------->


            <!--------------owl-carousel Advertise Lower Section Start------------>
            <div class="mobile-view-add-two" style="height:45px;"></div>
            @include('frontend.redparts.advertise_two')
            <!--------------owl-carousel Advertise Lower Section End------------>

            
            <div class="mobile-view" style="height:15px"></div>
            <div class="desktop-view"></div>

               @include('frontend.redparts.new_arrival')

              
               <div class="mobile-view-testimonial"></div>
               @include('frontend.redparts.testimonial')
               <div class="mobile-view-testimonial-bottom"></div>

            <!--------------All Category Products---------------->
            <div class="mobile-view" style="height:15px"></div>
           
            <div class="block block-products-columns">
               <div class="container">
                    <div class="row">
                       <div class="col-4">
                          <div class="block-products-columns__title">Todays Deal Products</div>
                          <div class="block-products-columns__list">
                             @foreach($todays_deal_products_footer as $product)
                             <div class="block-products-columns__list-item">
                                <div class="product-card">
                                   <div class="product-card__actions-list">
                                      <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                                         
                                      </button>
                                   </div>
                                   @php
                                      $product_url = route('product', $product->slug);
                                      if($product->auction_product == 1) {
                                         $product_url = route('auction-product', $product->slug);
                                      }
                                   @endphp
                                   <div class="product-card__image">
                                      <div class="image image--type--product">
                                         <a href="{{ $product_url }}" class="image__body"><img class="image__tag" src="{{ uploaded_asset($product->thumbnail_img) }}" alt=""></a></div>
                                   </div>
                                   <div class="product-card__info">
                                      <div class="product-card__name">
                                         <div>
                                            <!-- <div class="product-card__badges">
                                               <div class="tag-badge tag-badge--sale">sale</div>
                                               <div class="tag-badge tag-badge--new">new</div>
                                               <div class="tag-badge tag-badge--hot">hot</div>
                                            </div> -->
                                            <a href="{{ $product_url }}">{{ Str::limit($product->name, 40) }}</a>
                                         </div>
                                      </div>
                                      <div class="product-card__rating">
                                          <div class="rating product-card__rating-stars">
                                            <div class="rating rating-sm mt-2">
                                                {{ renderStarRating($product->rating) }} ({{$product->rating}})
                                             </div>
                                          </div> 
                                      </div>
                                   </div>
                                   <div class="product-card__footer">
                                      <div class="product-card__prices fw-600" style="color: black;">
                                         @if(home_base_price($product) != home_discounted_base_price($product))
                                         <del style="opacity:50%; margin-right:10px;">{{ home_base_price($product) }}</del>   
                                         @endif
                                         <span>{{ home_discounted_base_price($product) }}</span>
                                      
                                      </div>
                                   </div>
                                </div>
                             </div>
                             @endforeach
                          </div>
                       </div>

                       @include('frontend.redparts.all_category')



                    </div>
               </div>
            </div>
            <div class="mobile-view" style="height:15px"></div>
         </div>
      </div>
<script type="text/javascript">


   function openCity(evt, cityName) {
   var i, x, tablinks;
   var mySpan;

   x = document.getElementsByClassName("city");
   for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
   }
   tablinks = document.getElementsByClassName("tablink");
   for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-web-blue", " ");
   }
   document.getElementById(cityName).style.display = "block";
   evt.currentTarget.className += " w3-web-blue";
   }

   $(document).ready(function() {

      // Dependency Search Start
      $("#brand").change(function() {
         var brand_id = $(this).val();
         document.getElementById("model").disabled = false;
         if (brand_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/model')}}/" + brand_id,
                  success: function(res) {
                     if (res) {
                           $("#model").empty();
                           $("#model").append('<option value="0">Select Model</option>');
                           $.each(res, function(key, value) {
                              $("#model").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }

               });
         }
      });
      $('#model').change(function() {
         var model_id = $(this).val();
         document.getElementById("year").disabled = false;
         if (model_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/year')}}/" + model_id,
                  success: function(res) {
                     if (res) {
                           $("#year").empty();
                           $("#year").append('<option value="0">Select Year</option>');
                           $.each(res, function(key, value) {
                              $("#year").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });
      $('#year').change(function() {
         var year_id = $(this).val();
         var model_id = $('#model').val();
         document.getElementById("chassis").disabled = false;
         if (year_id) {
               $.ajax({
                  type: "get",
                  url: "{{url('/chassis')}}/" + year_id + '/' + model_id,
                  success: function(res) {
                     if (res) {
                           $("#chassis").empty();
                           $("#chassis").append('<option value="0">Select Chassis</option>');
                           $.each(res, function(key, value) {
                              $("#chassis").append('<option value="' + key + '">' + value + '</option>');
                           });
                     }
                  }
               });
         }
      });
      // Dependency Search End

      // Advertise Slider Upper Section 
      $('.adone').owlCarousel({
         loop:true,
         margin:10,
         autoplay:true,
         autoplayTimeout:7500,
         smartSpeed: 4000,
         autoplayHoverPause:true,
         responsiveClass:true,
         nav:false,
         responsive:{
            0:{
                  items:1
            },
            600:{
                  items:1
            },
            1000:{
                  items:2
            }
         }
      });
      // Advertise Slider Lower Section 
      $('.ad').owlCarousel({
         loop:true,
         margin:10,
         autoplay:true,
         autoplayTimeout:7500,
         smartSpeed: 4000,
         autoplayHoverPause:true,
         responsiveClass:true,
         nav:false,
         responsive:{
            0:{
                  items:1
            },
            600:{
                  items:2
            },
            1000:{
                  items:3
            }
         }
      });
      // Service Slider Section 
      $('.ser-up').owlCarousel({
         loop:true,
         margin:5,
         autoplay:false,
         autoplayTimeout:5500,
         smartSpeed: 3000,
         autoplayHoverPause:true,
         responsiveClass:true,
         nav:false,
         responsive:{
            0:{
                  items:2
            },
            600:{
                  items:2
            },
            1000:{
                  items:5
            }
         }
      });

      // products slider
      $('.owl-carousel').owlCarousel({
         loop:true,
         margin:10,
         autoplay:true,
         autoplayTimeout:8500,
         smartSpeed: 6000,
         autoplayHoverPause:true,
         responsiveClass:true,
         nav:false,
         responsive:{
            0:{
                  items:2
            },
            600:{
                  items:2
            },
            1000:{
                  items:5
            }
         }
      });



   });

</script> 
   </body>
@endsection