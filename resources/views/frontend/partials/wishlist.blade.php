<style>
    .heart{
        background-color:#1f1fda !important;
        margin-bottom: 26px;
        margin-right: 4px;
        padding: 7px;
    }
</style>
<a href="{{ route('wishlists.index') }}" class="d-flex align-items-center text-reset">
    <i class="la la-heart-o la-3x opacity-90 icon"></i>
    <span class="flex-grow-1 ml-1">
        @if(Auth::check())
            <span class="badge badge-primary badge-inline badge-pill heart">{{ count(Auth::user()->wishlists)}}</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill heart" style="">0</span>
        @endif
        {{-- <span class="nav-box-text d-none d-xl-block opacity-70">{{translate('Wishlist')}}</span> --}}
    </span>
</a>
