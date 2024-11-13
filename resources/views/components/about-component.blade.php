@foreach ($abouts as $about)
<!-- Start Our About
============================================= -->
<div class="about-area default-padding" id="about">
    <div class="container">
        <div class="about-items">
            <div class="row">
                <div class="col-lg-7 thumb-box">
                    <div class="thumb">
                        <i class="fas fa-heartbeat"></i>
                        <img src="{{ $about->photo1->getUrl() }}" alt="Thumb">
                        <img src="{{ $about->photo2->getUrl() }}" alt="Thumb">
                    </div>
                </div>
                <div class="col-lg-5 info">
                    <h5>{{ $about->title }}</h5>
                    <h2>{{ $about->subtitle }}</h2>
                    {!! $about->text !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Our About -->
@endforeach
