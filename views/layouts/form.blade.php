@include('components.head')
<body id="blank" class="body-{{ str_replace('.', '-', Route::currentRouteName()) }}">
    <div id="app">
        <section id="layout">
            <header id="brand" class="brand-gradient mb-3">
                <div class="mb-3">
                    <a href="{{ route('index') }}" id="logo"><img src="{{ asset('img/logo-my-robock-violet.png') }}" alt="My Robock" class="img-fluid"></a>
                </div>
            </header>
            <main id="main">
                <h2>@yield('title')</h2>
                @include('components.flash-messages')
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </section>
    </div>
    @include('components.footer')
    <script type="text/javascript" src="{{ asset('js/front/app.js') }}"></script>
</body>
</html>