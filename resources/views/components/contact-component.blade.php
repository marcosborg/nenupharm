<!-- Start Contact Area
============================================= -->
<div class="contact-area default-padding" id="contact">
    <div class="container">
        <div class="contact-items">
            <div class="row">
                <div class="col-lg-8 left-item">
                    <div class="content">
                        <h2>Contact our <strong>Support Office</strong></h2>
                        <form action="/contact-form" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        Send Message <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 right-item">
                    <div class="info-items">
                        @foreach ($contacts as $contact)
                        <!-- Single Item -->
                        <div class="item">
                            <div class="icon">
                                <i class="{{ $contact->icon }}"></i>
                            </div>
                            <div class="info">
                                <h5>{{ $contact->title }}</h5>
                                <p>
                                    {{ $contact->text }}
                                </p>
                            </div>
                        </div>
                        <!-- End Single Item -->
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Contact -->
