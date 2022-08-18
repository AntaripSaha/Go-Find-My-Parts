@extends('frontend.layouts.new_app')
@section('content')


<div class="site">
    <!-- site__header / end --><!-- site__body -->
    <div class="site__body">

        <div  style="width: 89% !important; padding:5px;">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <a class="navbar-brand"></a>
                <form action="{{route('mechanic.search')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control mr-sm-2" style="width: 120% !important; margin-top: -1.5% !important;"  name="name" type="search" placeholder="Search" aria-label="Search">

                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-success">Search</button>

                        </div>

                    </div>
                </form>
              </nav>
        </div>


        
    {{-- //owl-carousel --}}
                <div class="block-banners block" style="margin-top: 15px;">
                    <div class="container" style="width: 70% !important; height: 60% !important;">
                    <div class="block-banners__list" >
                        <div class="mechanic owl-carousel owl-theme">
                            @foreach($mechanics as $mechanic)
                            <div class="item">

                                <a href="{{route('mechanic.public.profile', $mechanic->id )}}">
                                    <div class="card" style="height:500px !important;">
                                        <img class="card-img-top" src="{{ uploaded_asset($mechanic->profile_image) }}" height="260px" width="auto" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$mechanic->user->name}}</h5>
                                        <p class="card-text">{{$mechanic->contact}}</p>
                                        <p class="card-text">{{$mechanic->address}}</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
    {{-- //owl-carousel --}}

    </div>
</div>
 <style>
    @media only screen and (min-width: 360px) and (max-width: 1200px) {
        .card-text{
            font-size: 8px;
        }
        .card-title{
            font-size: 10px;
        }
    }
 </style>

  <script type="text/javascript">

 
    $(document).ready(function() {

 
       // Advertise Slider Upper Section 
       $('.mechanic').owlCarousel({
          loop:false,
          margin:10,
          autoplay:true,
          autoplayTimeout:7500,
          smartSpeed: 4000,
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
@endsection