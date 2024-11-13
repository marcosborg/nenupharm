<!-- Start Banner 
    ============================================= -->
    <div class="banner-area shape">
        <div id="bootcarousel" class="carousel text-light text-large slide carousel-fade animate_text" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner text-center carousel-zoom">
                @foreach ($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="slider-thumb bg-cover" style="background-image: url('{{ $banner->photo->getUrl() }}');"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="content">
                                            <h2 data-animation="animated slideInDown">{{ $banner->header }} <strong>{{ $banner->sub_header }}</strong></h2>
                                            <a data-animation="animated fadeInUp" class="btn btn-md btn-gradient" href="{{ $banner->link }}">{{ $banner->button }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <!-- End Banner -->