<!-- Star Doctors Area
============================================= -->
<div class="doctors-area three-colum bg-gray default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4>Staff</h4>
                    <h2>Our Experts</h2>
                </div>
            </div>
        </div>
        <div class="doctor-items text-center">
            <div class="row">
                @foreach ($doctors as $doctor)
                <!-- Single Item -->
                <div class="col-md-6 single-item">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ $doctor->photo->getUrl() }}" alt="Thumb">
                        </div>
                        <div class="info">
                            <h4>{{ $doctor->name }}</h4>
                            <span>{{ $doctor->job }}</span>
                            <div class="consultation">
                                <h5>{!! $doctor->contacts !!}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Doctors Area -->
