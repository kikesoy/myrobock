<button class="btn btn-link d-md-none" type="button" data-toggle="collapse" data-target="#menu-collapse" aria-controls="menu-collapse" aria-expanded="false" aria-label="Toggle docs navigation">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path></svg>
</button>
<ul class="nav flex-column collapse" id="menu-collapse">
    <li class="nav-item @if (Route::is('*dashboard*')) active @endif"><a href="{{ route('dashboard.index') }}" class="nav-link"><i class="fas fa-home"></i>{{ trans('myrbckadmin.barraLateralIzquierda.home') }}</a></li>
    <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-file-invoice-dollar"></i>{{ trans('myrbckadmin.barraLateralIzquierda.order') }}<span class="badge badge-danger float-right">9</span></a></li>
    <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-store-alt"></i>{{ trans('myrbckadmin.barraLateralIzquierda.store') }}</a></li>
    <li class="nav-item @if (Route::is('*categories*')) active @endif"><a href="{{ route('categories-admin.index') }}" class="nav-link"><i class="far fa-list-alt"></i>{{ trans('myrbckadmin.barraLateralIzquierda.category') }}</a></li>
    <li class="nav-item @if (Route::is('*customers*') || Route::is('*employees*'))active @endif"><a href="#" class="nav-link nav-dropdown"><i class="fas fa-user"></i>{{ trans('myrbckadmin.barraLateralIzquierda.user') }}</a>
        <ul class="nav nav-sub-menu">
            <li class="nav-item @if (Route::is('*customers*'))active @endif"><a href="{{ route('customers.index') }}" class="nav-link">{{ trans('myrbckadmin.barraLateralIzquierda.customer') }}</a></li>
            <li class="nav-item @if (Route::is('*employees*'))active @endif"><a href="{{ route('employees.index') }}" class="nav-link">{{ trans('myrbckadmin.barraLateralIzquierda.employee') }}</a></li>
        </ul>
    </li>
    <li class="nav-item"><a href="{{ route('messenger-admin.index') }}" class="nav-link"><i class="fas fa-envelope"></i>{{ trans('myrbckadmin.barraLateralIzquierda.message') }} <span class="badge badge-danger float-right">9</span></a></li>
    <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-sliders-h"></i>{{ trans('myrbckadmin.barraLateralIzquierda.preferences') }}</a></li>
</ul>