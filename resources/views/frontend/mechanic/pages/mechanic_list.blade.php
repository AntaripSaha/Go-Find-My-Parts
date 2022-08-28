@extends('frontend.layouts.new_app')
@section('content')


<div class="site">
    <!-- site__header / end --><!-- site__body -->
    <div class="site__body">

        <div class="mechanic-search">
            <nav class="navbar-light bg-light justify-content-between">
                <a class="navbar-brand"></a>
                <form action="{{route('mechanic.search')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex position-relative align-items-center">
                            <input type="text" style="border-radius: 20px !important; " class="border-0 border-lg form-control" id="search" name="name" placeholder="Find Mechanic..." autocomplete="off">
                            <div class=>
                                <button class="btn btn-outline-secondary border-left-0 ico-background"  style="" type="submit">
                                    <i class="ico las la-search"></i>
                                </button>
                            </div>
                    </div>
                </form>
              </nav>
        </div>        
    {{-- //owl-carousel --}}
                <div class="block-banners block" style="margin-top: 15px;">
                    <div class="container" style="width: 100% !important; height: 60% !important;">
                    <div class="block-banners__list" >
                        <div class="mechanic owl-carousel owl-theme">
                            @foreach($mechanics as $mechanic)
                            @if(isset($mechanic->user->name))
                            <div class="item">
                                <a href="{{route('mechanic.public.profile', $mechanic->id )}}">
                                    <div class="card" style="height:500px !important;">
                                        <img class="card-img-top" src="{{ uploaded_asset($mechanic->profile_image) }}" height="250px" width="auto" alt="Card image cap">
                                        <div class="card-body"style="color: black !important">
                                            <h5 class="card-title">{{$mechanic->user->name}}</h5>
                                            <p class="card-text">{{$mechanic->contact}}</p>
                                            <p class="card-text">{{$mechanic->address}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @else
                            @endif
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>
                <div class="aiz-pagination" style="margin-bottom: 5px;">
                	{{ $mechanics->appends(request()->input())->links() }}
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
    @media only screen and (min-width: 390px) and (max-width: 480px) {
        .mechanic-search {
            width: 97% !important;
            margin-left: 5% !important;
            padding: 5px !important;
            margin-bottom: 7% !important;
        }
    }
    .mechanic-search{
        width: 55%;
        margin-left: 25%;
        padding: 5px;
        margin-bottom: 2%;
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
             400:{
                   items:2
             },
             1000:{
                   items:4
             }
          }
       });
      
 
 
 
    });
 
 </script> 
@endsection