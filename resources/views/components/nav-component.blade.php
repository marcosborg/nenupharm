<!-- Start Navigation -->
<nav class="navbar navbar-default brand-center center-side bootsnav">

    <div class="container">

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="/website/assets/img/logo.png" class="logo" alt="Logo">
            </a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                @foreach ($navigations as $nav)
                <li>
                    <a href="{{ $nav->link }}">{{ $nav->label }}</a>
                </li>
                @endforeach
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $language }}</a>
                    <ul class="dropdown-menu">
                        <li><a {{ $language == 'en' ? 'href=/change-language/pt' : '' }}>PT</a></li>
                        <li><a {{ $language == 'pt' ? 'href=/change-language/en' : '' }}>EN</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>

</nav>
<!-- End Navigation -->