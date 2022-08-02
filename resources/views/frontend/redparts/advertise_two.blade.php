   {{-- //owl-carousel --}}
   <div class="block-banners block">
      <div class="container">
         <div class="block-banners__list">
            <div class="ad owl-carousel owl-theme">
               @foreach($advertise_lower_section as $advertise)
                  <div class="item">
                     <a href="{{url($advertise->url)}}" class=" ">
                        <span class="">
                           <img src="{{ uploaded_asset($advertise->image) }}" alt=""  width="100%" height="auto">
                        </span>
                     </a>
                  </div>
               @endforeach
           </div>
         </div>
      </div>
   </div>
{{-- //owl-carousel --}}