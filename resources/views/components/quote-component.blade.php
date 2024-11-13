<!-- Start Doctor Quotes
============================================= -->
<div class="doctor-quotes-area default-padding-top">
    <div class="container">
        <div class="quotes-items">
            <div class="row align-center">
                @foreach ($quotes as $quote)
                <div class="col-lg-6 thumb">
                    <img src="{{ $quote->photo->getUrl() }}" alt="Thumb">
                </div>
                <div class="col-lg-6 info">
                    <blockquote>
                        {{ $quote->text }}
                    </blockquote>
                    <h2>{{ $quote->name }}</h2>
                    <span>
                        {{ $quote->job }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Doctor Quotes -->
