@extends('frontend.layouts.new_app')
@section('content')

<style>

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
      color: #5faf4b;
      font-size: 15px;
      font-weight: 400;
      margin-left: 85px;
      margin-top: -60px;
   }
   @media only screen and (max-width: 600px){
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
         height: 5px !important;
      }
      .mobile-view-add-two{
         height: 35px !important;
      }
   }

</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
                  <div class="w3-bar" style="background:black">
                     <button class="tablink w3-yellow block-finder__form-control block-finder__form-control--button" onclick="openCity(event,'Basic')">Basic</button>
                     <button class="tablink block-finder__form-control block-finder__form-control--button" onclick="openCity(event,'Advance')">Advance</button>
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
            <div class="mobile-view" style="height:35px"></div>

            @include('frontend.redparts.advertise_one')

            <!--------------owl-carousel Advertise Upper Section End ------------>


            <div class="mobile-view" style="height:25px"></div>

            <!-------------- Featured Product Section Start------------->
               @include('frontend.redparts.featured')
            <!-------------- Featured Product Section End------------->

            <div style="height:20px !important;"></div>


            <!-------------- Product Section Start------------->
               @include('frontend.redparts.product')
            <!-------------- Product Section End------------->


            <!--------------owl-carousel Advertise Lower Section Start------------>
            <div class="mobile-view-add-two" style="height:45px"></div>
            @include('frontend.redparts.advertise_two')
            <!--------------owl-carousel Advertise Lower Section End------------>
            <div class="mobile-view" style="height:25px"></div>

               @include('frontend.redparts.new_arrival')

               <div class="mobile-view" style="height:15px"></div>

               @include('frontend.redparts.testimonial')



            <!------------------ Category Section  Start --------------------->
            {{-- <div class="block block-brands block-brands--layout--columns-8-full">
               <div class="container">
                  <ul class="block-brands__list">
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-1.png')}}" alt=""> <span class="block-brands__item-name">AimParts</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-2.png')}}" alt=""> <span class="block-brands__item-name">WindEngine</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-3.png')}}" alt=""> <span class="block-brands__item-name">TurboElectric</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-4.png')}}" alt=""> <span class="block-brands__item-name">StartOne</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-5.png')}}" alt=""> <span class="block-brands__item-name">Brandix</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-6.png')}}" alt=""> <span class="block-brands__item-name">ABS-Brand</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-7.png')}}" alt=""> <span class="block-brands__item-name">GreatCircle</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-8.png')}}" alt=""> <span class="block-brands__item-name">JustRomb</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-9.png')}}" alt=""> <span class="block-brands__item-name">FastWheels</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-10.png')}}" alt=""> <span class="block-brands__item-name">Stroyka-X</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-11.png')}}" alt=""> <span class="block-brands__item-name">Mission-51</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-12.png')}}" alt=""> <span class="block-brands__item-name">FuelCorp</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-13.png')}}" alt=""> <span class="block-brands__item-name">RedGate</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-14.png')}}" alt=""> <span class="block-brands__item-name">Blocks</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-15.png')}}" alt=""> <span class="block-brands__item-name">BlackBox</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                     <li class="block-brands__item"><a href="#" class="block-brands__item-link"><img src="{{static_asset('assets/frontend/images/brands/brand-16.png')}}" alt=""> <span class="block-brands__item-name">SquareGarage</span></a></li>
                     <li class="block-brands__divider" role="presentation"></li>
                  </ul>
               </div>
            </div> --}}
            <!------------------ Category Section End --------------------->

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
                                            <a href="{{ $product_url }}">{{$product->name}}</a>
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
   x = document.getElementsByClassName("city");
   for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
   }
   tablinks = document.getElementsByClassName("tablink");
   for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-yellow", "");
   }
   document.getElementById(cityName).style.display = "block";
   evt.currentTarget.className += " w3-yellow";
   }

   $(document).ready(function() {

      // Dependency Search Start
      $("#brand").change(function() {
         var brand_id = $(this).val();
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