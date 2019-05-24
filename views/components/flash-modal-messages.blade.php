@if($errors->edit->any())
    <div class="alert alert-danger alert-messages">
        <h6>{{ trans('admin/category/notification.div0') }}:</h6>
        <ul>
            @foreach($errors->edit->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif($errors->create->any())
    <div class="alert alert-danger alert-messages">
        <h6>{{ trans('admin/category/notification.div0') }}:</h6>
        <ul>
            @foreach($errors->create->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif($errors->any())
    <div class="alert alert-danger alert-messages">
        <h6>{{ trans('admin/category/notification.div1') }}:</h6>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif