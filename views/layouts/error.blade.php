@include('components.head')
<body id="error" class="body-{{ str_replace('.', '-', Route::currentRouteName()) }}">
    @include('components.header-error')
    <div id="app" class="container">
        <main id="main" class="row align-items-center">
            <div class="col-md-3 offset-md-2 col-lg-2 offset-lg-3 align-self-center">
                <figure class="icon-error align-self-center">
                    <img src="{{ asset('img/icon-error.png') }}" alt="Ooops" class="img-fluid">
                </figure>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="content-error">
                    <hgroup>
                        <h1 class="display-1">@yield('title')</h1>
                        <h3>@yield('content')</h3>
                    </hgroup>
                    <p>Try searching or go to My Robock's home page.</p>
                    <a href="{{ route('index') }}" class="btn btn-primary">Go to home page</a>
                </div>
            </div>
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('js/front/app.js') }}"></script>
</body>
</html>