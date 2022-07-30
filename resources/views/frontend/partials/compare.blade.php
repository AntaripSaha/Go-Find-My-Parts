
<style>
    .compare{
        background-color:rgb(112, 206, 112) !important;
        margin-bottom: 26px;
        margin-right: 4px;
        padding: 7px;
    }
</style>

<a href="{{ route('compare') }}" class="d-flex align-items-center text-reset">
    <i class="la la-refresh la-2x opacity-80 icon"></i>
    <span class="flex-grow-1 ml-1">
        @if(Session::has('compare'))
            <span class="badge badge-primary badge-inline badge-pill compare">{{ count(Session::get('compare'))}}</span>
        @else
            <span class="badge badge-primary badge-inline badge-pill compare">0</span>
        @endif
        {{-- <span class="nav-box-text d-none d-xl-block opacity-70">{{translate('Compare')}}</span> --}}
    </span>
</a>