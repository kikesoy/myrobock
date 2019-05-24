<div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <p>{{ Auth::user()->email }}</p>
            <h6>Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}!</h6>
        </div>

        <ul class="list-unstyled components">
            <div class="btn-group btn-group-toggle btn-side d-flex justify-content-center">
                <label class="btn btn-sm btn-left side-desactive">
                    <a href="{{ route('my-account.index') }}">Buyer</a>
                </label>
                <label class="btn btn-right btn-sm side-active focus">
                    Seller
                </label>
            </div>
            
            <li @if (Route::getCurrentRoute()->uri() === 'my-account/store') class="active" @endif>
                <a href="{{ route('store.index') }}"><i class="fas fa-home"></i> Home</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-shopping-cart"></i> Sales Orders</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-boxes"></i></i> Products</a>
            </li>
            <li @if (substr(Route::getCurrentRoute()->uri(), 0, 20) === 'my-account/messenger') class="active" @endif>
                <a href="{{ route('messenger.index') }}"><i class="fas fa-envelope"></i> Messages</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-donate"></i> My Bank Accounts</a>
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