@include('components.admin-head')
<body id="admin" class="body-{{ str_replace('.', '-', Route::currentRouteName()) }}">
    <div id="app">
        @include('components.admin-header')
        <div id="layout" class="container-fluid">
            <div class="row">
                <aside id="menu" class="p-0 col-md-3 col-lg-2">
                    @include('components.admin-nav')
                </aside>
                <main id="main" class="@if (Auth::check()) offset-md-3 col-md-9 offset-lg-2 col-lg-10 @else col-12 @endif">
                    @include('components.flash-messages')
                    <div>
                        @yield('breadcrumbs')
                    </div>
                    <h1>@yield('title')</h1>
                    @include('components.flash-modal-messages')
                    @yield('content')
                </main><!-- #main -->
            </div><!-- .row -->
        </div><!-- #layout -->
        @include('components.admin-footer')
    </div><!-- #app -->
    @yield('extras')
    @yield('scripts')
</body>
</html>