
{{-- //owl-carousel --}}
<div class="block-banners block">
   <div class="container">
      <div class="block-banners__list">
         <div class="adone owl-carousel owl-theme">
            @foreach($advertise_upper_section as $advertise)
            <div class="item">
               <a href="{{url($advertise->url)}}">
                  <span>
                     <img src="{{ uploaded_asset($advertise->image) }}" alt="" width="100%" height="auto">
                  </span>
               </a>
            </div>
            @endforeach
        </div>
      </div>
   </div>
</div>
 {{-- //owl-carousel --}}
