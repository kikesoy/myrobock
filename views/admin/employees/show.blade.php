<table class="table table-sm mb-0">
    <tr id="s-email">
        <th>{{ trans('admin/employee/show.div.email') }}:</th>
        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
    </tr>
    <tr id="s-phone">
        <th>{{ trans('admin/employee/show.div.phone') }}:</th>
        <td>{{ $user->contact_number }}</td>
    </tr>
    <tr id="s-active">
        <th>{{ trans('admin/employee/show.div.active') }}:</th>
        <td>
            @if($user->active)
                <i class="fas fa-check-circle"></i>{{ trans('admin/employee/show.modal.yes') }}
            @else
                <i class="fas fa-times-circle"></i>{{ trans('admin/employee/show.modal.no') }}
            @endif
           
        </td>
    </tr>
    <tr id="s-lang-name">
        <th>{{ trans('admin/employee/show.div.language') }}:</th>
        <td>{{ $user->lang->name }}</td>
    </tr>
    <tr id="s-rol">
        <th>{{ trans('admin/employee/show.div.role') }}:</th>
        <td>{{ $user->rol }}</td>
    </tr>
    <tr id="s-created">
        <th>{{ trans('admin/employee/show.div.create') }}:</th>
        @if (App::getLocale() == 'es')
            {{ Date::setLocale(App::getLocale())}}
            <td>
                {{ Date::parse($user->created_at)->format('l j \\d\\e F Y h:i:s a')}}
            </td>
        @else
            <td>
                {{ Auth::user()->created_at->format('l jS \\of F Y h:i:s a') }}
            </td>
        @endif 
        {{-- <td>{{ $user->created_at->format('l jS \\of F Y h:i:s A') }}</td> --}}
    </tr>
    <tr id="s-updated">
        <th>{{ trans('admin/employee/show.div.update') }}:</th>
        <td>{{ $user->updated_at->diffForHumans() }}</td>
    </tr>
</table>