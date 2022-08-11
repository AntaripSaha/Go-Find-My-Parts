   
<style>
   @media only screen and (min-width: 360px) and (max-width: 700px){
      .mobile-price{
         font-size: 12px !important;
      }
   
   }

</style>
   
   <!-------------- New Arrival Product Section Start------------->
                <div class="block block-products-carousel" data-layout="horizontal">
               <div class="container">
                  <div class="section-header">
                     <div class="section-header__body">
                        <h2 class="section-header__title">New Arrivals</h2>
                        <div class="section-header__spring"></div>
                        <!-- <ul class="section-header__links">
                           <li class="section-header__links-item"><a href="#" class="section-header__links-link">Wheel Covers</a></li>
                           <li class="section-header__links-item"><a href="#" class="section-header__links-link">Timing Belts</a></li>
                           <li class="section-header__links-item"><a href="#" class="section-header__links-link">Oil Pans</a></li>
                           <li class="section-header__links-item"><a href="#" class="section-header__links-link">Show All</a></li>
                        </ul> -->
                        <div class="section-header__arrows">
                           <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                              <button class="arrow__button" type="button">
                                 <svg width="7" height="11">
                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                 </svg>
                              </button>
                           </div>
                           <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                              <button class="arrow__button" type="button">
                                 <svg width="7" height="11">
                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                       C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                 </svg>
                              </button>
                           </div>
                        </div>
                        <div class="section-header__divider"></div>
                     </div>
                  </div>
                  <div class="block-products-carousel__carousel">
                     <div class="block-products-carousel__carousel-loader"></div>


                     <div class="owl-carousel">
                        @php
                         $counter = 1;
                        @endphp

                        @foreach($all_products as $product)


   
                        
                           <div class="block-products-carousel__column">

                              
                            @if($counter % 2 == 0) 
                                 <div class="block-products-carousel__cell">

                                    <div class="product-card product-card--layout--horizontal">
                                       <div class="product-card__actions-list">
                                          <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                                            
                                          </button>
                                       </div>
                                       <div class="product-card__image">
                                       @php
                                          $product_url = route('product', $product->slug);
                                          if($product->auction_product == 1) {
                                             $product_url = route('auction-product', $product->slug);
                                          }
                                       @endphp
                                          <div class="image image--type--product">
                                             <a href="{{ $product_url }}" class="image__body">
                                                <img class="image__tag" src="{{ uploaded_asset($product->thumbnail_img) }}" alt="">
                                             </a>
                                          </div>
                                       </div>
                                       <div class="product-card__info">
                                          <div class="product-card__name mobile-price">
                                             <div class="mb-3">
                                                <a href="{{ $product_url }}">{{ Str::limit($product->name, 12) }}</a>
                                             </div>
                                          </div>
                                          <div class="product-card__rating">
                                             <div class="rating product-card__rating-stars">
                                                <div class="rating rating-sm mt-1">
                                                   {{ renderStarRating($product->rating) }} ({{$product->rating}})
                                               </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="product-card__footer ">
                                          <div class="product-card__prices  fw-600 mobile-price" style="color: black;">
                                             @if(home_base_price($product) != home_discounted_base_price($product))
                                             <del style="opacity:50%; margin-right:10px;">{{ home_base_price($product) }}</del>   
                                             @endif
                                             <span>{{ home_discounted_base_price($product) }}</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                               @else 
                        
                              
                        
                                 <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--layout--horizontal">
                                       <div class="product-card__actions-list">
                                          <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                                             
                                                

                                          </button>
                                       </div>
                                       <div class="product-card__image">
                                       @php
                                          $product_url = route('product', $product->slug);
                                          if($product->auction_product == 1) {
                                             $product_url = route('auction-product', $product->slug);
                                          }
                                       @endphp
                                          <div class="image image--type--product">
                                             <a href="{{ $product_url }}" class="image__body">
                                                <img class="image__tag" src="{{ uploaded_asset($product->thumbnail_img) }}" alt=""></a></div>
                                       </div>
                                       <div class="product-card__info">
                                          <div class="product-card__name  mobile-price">
                                             <div class="mb-3"><a href="{{ $product_url }}">{{ Str::limit($product->name, 12) }}</a></div>
                                          </div>
                                          <div class="product-card__rating">
                                             <div class="rating rating-sm">
                                                {{ renderStarRating($product->rating) }} ({{$product->rating}})
                                            </div> 
                                          </div>
                                       </div>
                                       <div class="product-card__footer">
                                          <div class="product-card__prices fw-600 mobile-price" style="color: black;">
                                             @if(home_base_price($product) != home_discounted_base_price($product))
                                             <del style="opacity:50%; margin-right:10px;">{{ home_base_price($product) }}</del>   
                                             @endif
                                             
                                             <span >{{ home_discounted_base_price($product) }}</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                             @endif


                           </div>
                           @php
                           $counter++;
                           @endphp
                        @endforeach
                     </div>
                     </div>
                  </div>
               </div>
            </div>

               <!-------------- New Arrival Product Section End------------->

