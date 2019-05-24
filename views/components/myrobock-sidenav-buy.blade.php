<div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <p>{{ Auth::user()->email }}</p>
            <h6>Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}!</h6>
        </div>

        <ul class="list-unstyled components">
            {{-- TODO: Debemos ocultar el menu de cambio para los no compradores/vendedores --}}
            @if (Auth::user()->certificate === 1)
                <div class="btn-group btn-group-toggle btn-side d-flex justify-content-center">
                    <label class="btn btn-sm side-active btn-left focus">
                        Buyer
                    </label>
                    <label class="btn btn-right btn-sm side-desactive">
                            <a href="{{ route('store.index') }}">Seller</a>
                    </label>
                </div>
            @endif
            
            <li @if (Route::getCurrentRoute()->uri() === 'my-account') class="active" @endif>
                <a href="{{ route('my-account.index') }}"><i class="fas fa-home"></i> Home</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-map-marker-alt"></i> Addresses</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-award"></i> Certificate</a>
            </li>
            <li @if (substr(Route::getCurrentRoute()->uri(), 0, 20) === 'my-account/messenger') class="active" @endif>
                <a href="{{ route('messenger.index') }}"><i class="fas fa-envelope"></i> Messages</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-heart"></i> Favorites</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-star-half"></i> Whislist</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cog"></i></i> Configuration</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#"><i class="fas fa-edit"></i> Edit personal info</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-key"></i> Change password</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>