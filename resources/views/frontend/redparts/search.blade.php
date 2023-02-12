<style>
    .search-button {
        /* border-top-right-radius: 30px !important;
    border: none;
    padding: 0px 40px;
    height: 30px !important;
    transition: background 0.2s, color 0.2s;
    background-color: #72b860;
    color: #fff;
    border-bottom-right-radius: 30px !important;
   

 */

    }

    .make-new {
        /* border-top-left-radius: 30px !important;
      height: 60px !important;
      border-bottom-left-radius: 30px !important;
      background-color: #fff;
      background-repeat: no-repeat;
      text-align: left; */
    }

    .tab {
        display: none;
    }
</style>
<form class="block-finder__form" action="{{ route('dependent.search') }}" method="POST">
    @csrf
    <div class="container tab-basic-search-desktop tab-basic-search">
        <div class="row">

            @if (!empty($vehicles))
                @foreach ($vehicles as $key => $vehicle)
                    <div class="col-md-9 col-sm-9  col-lg-3">
                        <div class="block-finder__form-control block-finder__form-control--select tables">
                            <select name="brand_dependency" id='brand' aria-label="Vehicle Year">
                                <option value="{{ $vehicle->brand->id }}">{{ $vehicle->brand->name }}</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-lg-3">
                        <div class="block-finder__form-control block-finder__form-control--select tables">
                            <select name="model" id="model" aria-label="Vehicle Make">
                                <option value="{{ $vehicle->model->id }}">{{ $vehicle->model->model_name }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-9 col-lg-3">
                        <div class="block-finder__form-control block-finder__form-control--select tables">
                            <select name="year" id="year" aria-label="Vehicle Model">
                                <option value="{{ $vehicle->year->id }}">{{ $vehicle->year->year }}</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-9 col-lg-3">
                        <div class="block-finder__form-control block-finder__form-control--select tables">
                            <select name="chassis" id="chassis" aria-label="Vehicle Engine" disabled="disabled">

                            </select>
                        </div>

                    </div>
                @endforeach

                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            @else
                <div class="col-md-9 col-sm-9  col-lg-3">
                    <div class="block-finder__form-control block-finder__form-control--select tables">
                        <select name="brand_dependency" id='brand' aria-label="Vehicle Year">
                            <option value="0">Select Make</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-lg-3">
                    <div class="block-finder__form-control block-finder__form-control--select tables">
                        <select name="model" id="model" aria-label="Vehicle Make" disabled="disabled">

                        </select>
                    </div>

                </div>
                <div class="col-md-9 col-sm-9 col-lg-3">
                    <div class="block-finder__form-control block-finder__form-control--select tables">
                        <select name="year" id="year" aria-label="Vehicle Model" disabled="disabled">

                        </select>
                    </div>

                </div>
                <div class="col-md-9 col-sm-9 col-lg-3">
                    <div class="block-finder__form-control block-finder__form-control--select tables">
                        <select name="chassis" id="chassis" aria-label="Vehicle Engine" disabled="disabled">

                        </select>
                    </div>

                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            @endif



            <div class="col-md-7 col-sm-9 col-lg-3">
                <button
                    class="sub_btn_dev block-finder__form-control block-finder__form-control--button btn-block custom_search"
                    type="submit">Search</button>
            </div>

        </div>
    </div>
</form>

<style>
    .custom_search {
        background-color: #1f1fda !important;
        width: 95%;
        margin-top: 2% !important;
        color: rgb(213, 221, 221);
        margin: 0 auto;
    }

    .custom_search:hover {
        color: #000;
    }

    @media only screen and (min-width: 360px) and (max-width: 700px) {

        .custom_search {
            width: 75%;
        }


    }

    @media only screen and (min-width: 767px) and (max-width: 800px) {
        .custom_search {
            width: 104% !important;
            margin-left: 2% !important;
        }
    }

    @media only screen and (min-width: 801px) and (max-width: 1200px) {
        .custom_search {
            width: 100% !important;
            margin-left: 15% !important;
        }
    }

    @media only screen and (min-width: 767px) and (max-width: 1200px) {
        .tab-basic-search {
            margin-left: 17.7% !important;
        }

    }

    @media only screen and (min-width: 1200px) {}
</style>

<script type="text/javascript">
    // $(document).ready(function() {


    //    $('make').style.borderBottomLeftRadius = "30px";


    // });
</script>
