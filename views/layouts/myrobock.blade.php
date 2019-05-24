@include('components.head')
<body id="body-{{ str_replace('.', '-', Route::currentRouteName()) }}"
      class="front front-{{ str_replace('.', '-', Route::currentRouteName()) }}">
<div id="app">
    @include('components.header')
    <section id="layout">
        @include('components.flash-messages')
     
        <div class="row" style="margin-right: 0;">
            <aside id="menu" class="p-0 col-md-3 col-lg-2">
                {{-- TODO: Debemos ocultar el sidebar en el home del proyecto --}}
                @if(Route::getCurrentRoute()->uri() === 'my-account') 
                    @include('components.myrobock-sidenav-buy')
                @elseif(Route::getCurrentRoute()->uri() === 'my-account/store') 
                    @include('components.myrobock-sidenav-sell')
                @elseif(substr(Route::getCurrentRoute()->uri(), 0, 20) === 'my-account/messenger') 
                {{-- TODO: Debemos ver de cual sidebar quiere redireccionar en caso que sea comprador/vendedor --}}
                    @if (Auth::user()->certificate === 1)
                        @include('components.myrobock-sidenav-sell')
                    @else
                        @include('components.myrobock-sidenav-buy')
                    @endif
                @endif
            </aside>
            <main id="main" class="col-md-10 dashboard-content">
                <div class="row justify-content-end">
                    @yield('breadcrumbs')
                </div>
                <h1>@yield('title')</h1>
                @include('components.flash-modal-messages')
                @yield('content')
            </main><!-- #main -->
        </div><!-- .row -->
    </section>
    @include('components.footer')
    @include('components.categories')
</div>
@yield('extras')
@yield('scripts')
</body>
</html>