
            <div class="block block-products-carousel" data-layout="grid-5">
               <div class="container">
                  <div class="section-header">
                     <div class="section-header__body">
                        <h2 class="section-header__title">Featured Products</h2>
                        <div class="section-header__spring"></div>
                        <!-- <ul class="section-header__groups">
                           <li class="section-header__groups-item"><button type="button" class="section-header__groups-button section-header__groups-button--active">All</button></li>
                           <li class="section-header__groups-item"><button type="button" class="section-header__groups-button">Power Tools</button></li>
                           <li class="section-header__groups-item"><button type="button" class="section-header__groups-button">Hand Tools</button></li>
                           <li class="section-header__groups-item"><button type="button" class="section-header__groups-button">Plumbing</button></li>
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

                     @foreach($featured_products as $product)
                        <div class="block-products-carousel__column">
                           <div class="block-products-carousel__cell">
                              <div class="product-card product-card--layout--grid">
                                 <div class="product-card__actions-list">
                                    <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list" onclick="addToWishList({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                                       <svg width="16" height="16">
                                          <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                             l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                       </svg>
                                    </button>
                                    <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare"  onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                                       <svg width="16" height="16">
                                          <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                          <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                          <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                       </svg>
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
                                    
                                    {{-- @if($product->current_stock >= 1 )
                                       <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                          <div class="status-badge__body">
                                             <div class="status-badge__icon">
                                                <svg width="13" height="13">
                                                   <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                </svg>
                                             </div>
                                             <div class="status-badge__text">{{$product->name}}</div>
                                             <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="{{$product->name}}"></div>
                                          </div>
                                       </div>
                                    @endif --}}
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
                                    <!-- <div class="product-card__rating">
                                       <div class="rating product-card__rating-stars">
                                          <div class="rating__body">
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star"></div>
                                          </div>
                                       </div>
                                       <div class="product-card__rating-label">4 on 3 reviews</div>
                                    </div> -->
                                 </div>
                                 <div class="product-card__footer">
                                    <div class="product-card__prices">
                                       @if(home_base_price($product) != home_discounted_base_price($product))
                                       <del style="opacity:50%; margin-right:10px;">{{ home_base_price($product) }}</del>   
                                       @endif
                                       <span class="fw-600" style="color:black">{{ home_discounted_base_price($product) }}</span>
                                    
                                    </div>
                                  
                                    <button type="button" class="btn btn-primary cart-icon" onclick="showAddToCartModal({{ $product->id }})" data-toggle="tooltip" data-title="{{ translate('Add to cart') }}" data-placement="left">
                                       <i style="font-size: 30px;" class="las la-plus-circle cart-icon"></i>
                                       {{-- <svg width="20" height="20">
                                          <circle cx="7" cy="17" r="2"/>
                                          <circle cx="15" cy="17" r="2"/>
                                          <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                             V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                             C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                       </svg> --}}
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>

                     @endforeach

                        <!-- <div class="block-products-carousel__column">
                           <div class="block-products-carousel__cell">
                              <div class="product-card product-card--layout--grid">
                                 <div class="product-card__actions-list">
                                    <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
                                       <svg width="16" height="16">
                                          <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
                                             M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                       </svg>
                                    </button>
                                    <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
                                       <svg width="16" height="16">
                                          <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
                                             l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                       </svg>
                                    </button>
                                    <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">
                                       <svg width="16" height="16">
                                          <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                          <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                          <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                       </svg>
                                    </button>
                                 </div>
                                 <div class="product-card__image">
                                    <div class="image image--type--product"><a href="product-full.html" class="image__body"><img class="image__tag" src="{{static_asset('assets/frontend/images/products/product-2-245x245.jpg')}}" alt=""></a></div>
                                    <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                       <div class="status-badge__body">
                                          <div class="status-badge__icon">
                                             <svg width="13" height="13">
                                                <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                             </svg>
                                          </div>
                                          <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                          <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="product-card__info">
                                    <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span> 573-23743-C</div>
                                    <div class="product-card__name">
                                       <div><a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a></div>
                                    </div>
                                    <div class="product-card__rating">
                                       <div class="rating product-card__rating-stars">
                                          <div class="rating__body">
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                             <div class="rating__star rating__star--active"></div>
                                          </div>
                                       </div>
                                       <div class="product-card__rating-label">5 on 22 reviews</div>
                                    </div>
                                 </div>
                                 <div class="product-card__footer">
                                    <div class="product-card__prices">
                                       <div class="product-card__price product-card__price--current">$224.00</div>
                                    </div>
                                    <button class="product-card__addtocart-icon" type="button" aria-label="Add to cart">
                                       <svg width="20" height="20">
                                          <circle cx="7" cy="17" r="2"/>
                                          <circle cx="15" cy="17" r="2"/>
                                          <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                             V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                             C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                       </svg>
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div> -->

                        
                     </div>
                  </div>

               </div>
            </div>