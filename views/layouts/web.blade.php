@include('components.head')
<body id="body-{{ str_replace('.', '-', Route::currentRouteName()) }}"
      class="front front-{{ str_replace('.', '-', Route::currentRouteName()) }}">
<div id="app">
    @include('components.header')
    <section id="layout">
        @include('components.flash-messages')
        {{-- Bloque para mostrar el slider en el homepage --}}
        @if (Route::getCurrentRoute()->uri() === '/')
            @include('components.slider')
        @endif
        <div class="row">
            <div class="col align-self-end">
                @yield('breadcrumbs')
            </div>
        </div>
        <main id="main" @if(trim($__env->yieldContent('form'))) class="container" @else class="container-fluid" @endif>
            @if(trim($__env->yieldContent('title')))
                <div class="row">
                    <h2 class="col-12 display-2">@yield('title')</h2>
                </div>
            @endif
            <div class="row">
                @if(trim($__env->yieldContent('form')))
                    <div class="box-container">
                        @yield('form')
                    </div>
                @else
                    @yield('content')
                @endif
            </div>
        </main>
    </section>
    @include('components.footer')
    @include('components.categories')
</div>
@yield('extras')
@yield('scripts')
</body>
</html>