<div class="d-flex flex-row justify-content-around user-status">
    <div id="s-active">
        <span><i class="fas fa-2x"></i>{{ trans('admin/customer/show.div.active') }}:</span>
    </div>
    <div id="s-validate">
        <span><i class="fas fa-2x"></i>{{ trans('admin/customer/show.div.validate') }}:</span>
    </div>
    <div id="s-certificate">
        <span><i class="fas fa-2x"></i>{{ trans('admin/customer/show.div.certificate') }}:</span>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-sm mb-0">
        <tr id="s-email">
            <th><i class="fas fa-envelope"></i> {{ trans('admin/customer/show.div.email') }}:</th>
            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
        </tr>
        <tr id="s-phone">
            <th><i class="fas fa-phone"></i> {{ trans('admin/customer/show.div.phone') }}:</th>
            <td><span>{{ $user->contact_number }}</span></td>
        </tr>
        <tr id="s-lang-name">
            <th><i class="fas fa-comment"></i> {{ trans('admin/customer/show.div.language') }}:</th>
            <td>{{ $user->lang->name }}</td>
        </tr>
        <tr id="s-rol">
            <th><i class="fas fa-user"></i> {{ trans('admin/customer/show.div.role') }}:</th>
            <td>{{ $user->rol }}</td>
        </tr>
        <tr id="s-created">
            <th><i class="far fa-calendar-alt"></i> {{ trans('admin/customer/show.div.create') }}:</th>
            @if (App::getLocale() == 'es')
                <td>
                    {{ Date::setLocale(App::getLocale())}}
                    {{ Date::parse($user->created_at)->format('l j \\d\\e F Y h:i:s A')}}
                </td>
            @else
                <td>{{ Auth::user()->created_at->format('l jS \\of F Y h:i:s A') }}</td>
            @endif
        </tr>
        <tr id="s-updated">
            <th><i class="far fa-calendar-check"></i> {{ trans('admin/customer/show.div.update') }}:</th>
            <td>{{ $user->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
</div>