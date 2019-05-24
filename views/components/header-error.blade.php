<header id="header" class="brand-gradient-static">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-4 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ route('index') }}" id="logo"><img src="{{ asset('img/logo-my-robock-light.png') }}" alt="My Robock" class="img-fluid"></a>
            </div>
            <div class="col-8 col-sm-8 col-md-9 col-lg-10">
                @include('components.nav-search')
            </div>
        </div>
    </div>
</header>