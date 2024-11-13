<!-- Start Feature 
============================================= -->
<div class="features-area default-padding-top bottom-less">
    <div class="container">
        <div class="features-box">
            <div class="row">
                @foreach ($features as $feature)
                    <!-- Single Item -->
                <div class="single-item col-md-6">
                    <div class="item">
                        <h5>{{ $feature->title }}</h5>
                        <p>
                            {{ $feature->text }}
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Feature -->
