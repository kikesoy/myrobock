<header id="header" class="d-flex flex-row align-items-center fixed-top">
    <div class="col-4">
        <a href="{{ route('dashboard.index') }}" id="logo"><img src="{{ asset('img/logo-my-robock-gray-light.png') }}"
                                                                alt="My Robock" class="img-fluid"></a>
    </div>
    <div class="col-8">
        <div class="dropdown float-right">
            @guest
                <a class="btn btn-sm btn-secondary" href="{{ route('login') }}">Login <i class="fas fa-sign-in-alt"></i></a>
                <a class="btn btn-sm btn-secondary" href="{{ route('register') }}">Register <i
                            class="fas fa-user-circle"></i></a>
            @else
                <a href="#" role="button" class="dropdown-toggle" id="dropdown-menu-link" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-menu-link">
                    <a class="dropdown-item" href="{{ route("employees.edit", Auth::user()->id_employee) }}"><i
                                class="fas fa-user-circle"></i>{{ trans('myrbckadmin.menuDesplegable1.profile') }}</a>
                    <a class="dropdown-item" href="{{ route('logout-admin') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('myrbckadmin.menuDesplegable1.session') }}
                        <i class="fas fa-sign-out-alt"></i></a>
                    @foreach ($langs as $lang)
                        <form id="admin-header-form" class="form-horizontal" method="post"
                              action="{{ route('lang.locale') }}">
                            {{ csrf_field() }}
                            <input id="iso_code" type="hidden" value="{{ $lang->iso_code }}" name="iso_code">
                            <input id="model" type="hidden" value="{{ Auth::user()->getTable() }}" name="model">
                            <button type="submit" class="dropdown-item">
                                {{ $lang->name }}
                            </button>
                        </form>
                    @endforeach
                    <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endguest
        </div>
    </div>
</header>