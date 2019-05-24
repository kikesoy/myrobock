<nav id="nav" class="navbar navbar-expand-md">
    <div class="navbar-brand order-sm-1 order-1">
        <a href="{{ route('index') }}" id="logo"><img src="{{ asset('img/logo-my-robock-light.png') }}" alt="My Robock"
                                                      class="img-fluid"></a>
    </div>
    {{-- SEARCH RESPONSIVE SMALL --}}
    <div id="search" class="d-md-none order-sm-2 order-2 flex-grow-1">
        @include('components.nav-search')
    </div>
    <button class="navbar-toggler collapsed order-sm-3 order-3 ml-3" type="button" data-toggle="collapse"
            data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars open-nav"></i>
            <i class="fas fa-times close-nav"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse order-sm-4 order-4" id="mainNavbar">
        {{-- MAIN NAV --}}
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="" class="nav-link" id="nav-categories">{{ trans('myrobock.category') }}</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" id="nav-hot-deals">{{ trans('myrobock.deal') }}</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" id="nav-sell">{{ trans('myrobock.sell') }}</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link" id="nav-help">{{ trans('myrobock.help') }}</a>
            </li>
        </ul>
        {{-- AUTH & CART --}}
        <ul class="navbar-nav">
            {{-- Authentication Links --}}
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ trans('myrobock.login') }}<i
                                class="fas fa-sign-in-alt"></i></a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">{{ trans('myrobock.register') }}
                        <i class="fas fa-user-circle"></i></a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('my-account.index') }}" class="dropdown-item"><i
                                    class="fas fa-calendar-alt"></i>{{ trans('myrobock.order') }}</a>
                        <a href="{{ route('my-account.index') }}" class="dropdown-item"><i
                                    class="fas fa-user-circle"></i>{{ trans('myrobock.account') }}</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i>{{ trans('myrobock.logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @foreach ($langs as $lang)
                            <form id="header-form" class="form-horizontal" method="post"
                                  action="{{ route('lang.locale') }}">
                                {{ csrf_field() }}
                                <input id="iso_code" type="hidden" value="{{ $lang->iso_code }}" name="iso_code">
                                <input id="model" type="hidden" value="{{ Auth::user()->getTable() }}" name="model">
                                <button type="submit" class="dropdown-item">
                                    {{ $lang->name }}
                                </button>
                            </form>
                        @endforeach
                    </div>
                </li>
            @endguest
            {{-- Cart --}}
            <li class="nav-item"><a href="" class="nav-link"><i
                            class="fas fa-shopping-cart"></i> {{ trans('myrobock.cart') }} <span
                            class="cart-items">9999</span></a></li>
        </ul>
    </div>
</nav>