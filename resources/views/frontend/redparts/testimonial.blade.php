            <!--------------- Testimonial Section Start  ---------->
            <div class="block block-posts-carousel block-posts-carousel--layout--grid" data-layout="grid">
               <div class="container">
                  <div class="section-header">
                     <div class="section-header__body">
                        <h2 class="section-header__title">Testimonials</h2>
                        <div class="section-header__spring"></div>
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
                  <div class="block-posts-carousel__carousel">
                     <div class="owl-carousel">
                     @foreach($testimonials as $blog)
                        <div class="block-posts-carousel__item">

                           <div class="post-card">
                              <div class="custom-imgs">
                                 <a href="#"><img class="slider-img-avater" src="{{ uploaded_asset($blog->meta_img) }}" alt=""></a>
                                 </div>
                               
                              <div class="post-card__content">
                                 {{-- <div class="post-card__category">{{ $blog->category_name }}</div> --}}
                                 <div class="post-card__title">
                                    <h2>{{ $blog->title }}</h2>
                                 </div>
                                 <div class="post-card__date">By <a href="#">{{ $blog->meta_keywords }}</div>
                                  
                                 <div class="post-card__more"><a href="#" class="btn btn-secondary btn-sm">Read more</a></div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <!--------------- Testimonial Section End  ---------->

<style>
  .custom-imgs img.slider-img-avater{
      width: 50% !important;
      margin-top: 3% !important;
      max-width: 35% !important;
      height: auto !important;
      border-radius: 50% !important;
      margin-left: 30% !important;
   }

</style>
