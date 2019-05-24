<nav id="cat-menu" class="cat-menu">
    <div class="cat-menu-container">
        <header class="cat-menu-header">
            <div class="cat-menu-brand">
                <img src="{{ asset('img/logo-my-robock-light.png') }}" alt="">
            </div>
            <div class="cat-menu-close">
                <a href="#"><i class="far fa-times-circle"></i></a>
            </div>
        </header>
        <div class="cat-menu-body">
            <ul id="menu-cat-main" class="visible">
                <li>
                    <h5 class="cat-menu-title"><i class="fas fa-bars"></i> {{ __('myrobock.category') }}</h5>
                </li>
                @foreach ($categories as $categoryXLevel)
                    @foreach ($categoryXLevel->toArray() as $category)
                        @break($category['level_depth'] > 2)
                        <li id="cat-{{$category['id_category']}}" class="cat-menu-next">
                            <a href="#">{{current($category   ['langs'])['name']}}</a>
                            <a href="#"><i class="fas     fa-chevron-right"></i></a>
                        </li>
                    @endforeach
                @endforeach
                <footer>
                    @guest
                        <li>
                            <h6 class="cat-menu-footer-title">{{__('myrobock.account_guest')}}</h6>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}">{{ __('myrobock.login') }} <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}">{{ __('myrobock.register') }} <i
                                        class="fas fa-user-circle"></i></a>
                        </li>
                    @else
                        <li>
                            <h6 class="cat-menu-footer-title">{{__('myrobock.settings')}}</h6>
                        </li>
                        <li>
                            <a href="{{ route('my-account.index') }}"><i
                                        class="fas fa-user-circle mr-1"></i> {{ __('myrobock.account') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-out-alt mr-1"></i> {{ __('myrobock.logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </footer>
            </ul>
            @foreach ($categories as $categoryXLevel)
                @foreach ($categoryXLevel->where('level_depth',3)->groupBy('id_parent')->toArray() as $categoryXIdsParent)
                    <ul id="menu-cat-{{current($categoryXIdsParent)['id_parent']}}" class="cat-child hidden-right">
                        @foreach ($categoryXIdsParent as $category)
                            <li>
                                <a href="{{$category['id_category']}}-{{current($category['langs'])['slug']}}"
                                   class="cat-menu-link">{{current($category['langs'])['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="cat-menu-overlay"></div>
</nav>