<div class="aiz-user-sidenav-wrap position-relative z-1 shadow-sm">
    <div class="aiz-user-sidenav rounded overflow-auto c-scrollbar-light pb-5 pb-xl-0">
        <div class="p-4 text-xl-center mb-4 border-bottom text-black position-relative">
            <span class="avatar avatar-md mb-3">
                @if ($profile->profile_image != null)
                    <img src="{{ uploaded_asset($profile->profile_image) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @else
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image rounded-circle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @endif
            </span>
            <h4 class="h5 fs-16 mb-1 fw-600">{{$profile->user->name }}</h4>
            @if($profile->user->phone != null)
                <div class="text-truncate opacity-60">{{ $profile->user->phone }}</div>
            @else
                <div class="text-truncate opacity-60">{{ $profile->user->email }}</div>
            @endif
        </div>
        @if(Auth::id() == $profile->user->id)
            <div class="sidemnenu mb-3">
                <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('mechanic.dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['mechanic.dashboard'])}}">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('mechanic.profile') }}" class="aiz-side-nav-link {{ areActiveRoutes(['mechanic.profile'])}}">
                            <i class="las la-pen aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Edit Profile</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('mechanic.password')}}" class="aiz-side-nav-link {{ areActiveRoutes(['mechanic.password'])}}">
                            <i class="las la-id-badge aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Manage Profile</span>
                        </a>
                    </li>
    
                </ul>
            </div>
            <div class="sidemnenu mb-5 border-top">
                <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-id-badge aiz-side-nav-icon"></i>
                            <h5 class="h5 fs-16 mb-1 fw-400"><b>Brands</b></br></h5>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link"  style="text-align: left;">
                            {{ implode(", ",$profile->my_brand_names) }}
                        </a>
                    </li>
                    <li class="aiz-side-nav-item border-top  p-1">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-id-badge aiz-side-nav-icon"></i>
                            <h5 class="h5 fs-16 mb-1 fw-400"><b>Description</b></br></h5>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link" style="text-align: left;">{{$profile->description}}
                        </a>
                    </li>
                </ul>
            </div>
        @else
            <div class="sidemnenu mb-5 ">
                <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-id-badge aiz-side-nav-icon"></i>
                            <h5 class="h5 fs-16 mb-1 fw-400"><b>Brands</b></br></h5>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item ">
                        <a href="#" class="aiz-side-nav-link">
                            {{ implode(", ",$profile->my_brand_names) }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidemnenu mb-5 border-top">
                <ul class="aiz-side-nav-list px-2" data-toggle="aiz-side-menu">
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-id-badge aiz-side-nav-icon"></i>
                            <h5 class="h5 fs-16 mb-1 fw-400"><b>Description</b></br></h5>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link" style="text-align: left;">{{$profile->description}}
                        </a>
                    </li>
                </ul>
            </div>
        @endif

    </div>
    <div class="fixed-bottom d-xl-none bg-white border-top d-flex justify-content-between px-2" style="box-shadow: 0 -5px 10px rgb(0 0 0 / 10%);">
        <a class="btn btn-sm p-2 d-flex align-items-center" href="{{ route('logout') }}">
            <i class="las la-sign-out-alt fs-18 mr-2"></i>
            <span>{{ translate('Logout') }}</span>
        </a>
        <button class="btn btn-sm p-2 " data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
</div>
