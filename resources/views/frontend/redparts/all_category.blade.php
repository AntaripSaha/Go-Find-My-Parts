<div class="col-4">
                          <div class="block-products-columns__title">Newest Products</div>
                          <div class="block-products-columns__list">
                             @foreach($newest_products_footer as $product)
                             <div class="block-products-columns__list-item">
                                <div class="product-card">
                                   <div class="product-card__actions-list">
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
                                         <!-- <div class="rating product-card__rating-stars">
                                            <div class="rating__body">
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star"></div>
                                            </div>
                                         </div> -->
                                         <!-- <div class="product-card__rating-label">4 on 3 reviews</div> -->
                                      </div>
                                   </div>
                                   <div class="product-card__footer">
                                      <div class="product-card__prices">
                                         @if(home_base_price($product) != home_discounted_base_price($product))
                                         <del style="opacity:50%; margin-right:10px;">{{ home_base_price($product) }}</del>   
                                         @endif
                                         <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                                      
                                      </div>
                                   </div>
                                </div>
                             </div>
                             @endforeach
                          </div>
                       </div>

                       
                       <div class="col-4">
                          <div class="block-products-columns__title">Featured Products</div>
                          <div class="block-products-columns__list">
                             @foreach($featured_products_footer as $product)
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
                                         <!-- <div class="rating product-card__rating-stars">
                                            <div class="rating__body">
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star rating__star--active"></div>
                                               <div class="rating__star"></div>
                                            </div>
                                         </div> -->
                                         <!-- <div class="product-card__rating-label">4 on 3 reviews</div> -->
                                      </div>
                                   </div>
                                   <div class="product-card__footer">
                                      <div class="product-card__prices">
                                         @if(home_base_price($product) != home_discounted_base_price($product))
                                         <del style="opacity:50%; margin-right:10px;">{{ home_base_price($product) }}</del>   
                                         @endif
                                         <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                                      
                                      </div>
                                   </div>
                                </div>
                             </div>
                             @endforeach
                          </div>
                       </div>