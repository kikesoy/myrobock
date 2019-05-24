@extends('layouts.admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('categoryEdit', $category) }}
@endsection

{{-- SECTION TITLE --}}
@section('title', trans('admin/category/edit.title'). ':' . $category->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name )

@section('content')
    <div class="box-content-admin mb-3">
        <form id="category-form" class="form-horizontal" method="POST" action="{{ route('categories-admin.update', $category->id_category) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ trans('admin/category/edit.content.name') }}:</label>
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($category->langs as $lang)
                            <li class="nav-item">
                                <a class="nav-link" id="tab-{{ $lang->iso_code }}" data-toggle="tab" href="#pane-{{ $lang->iso_code }}" role="tab" aria-controls="{{ $lang->iso_code }}" aria-selected="true">{{ $lang->iso_code }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="lang-panes">
                        @foreach($category->langs as $lang)
                            <div class="tab-pane fade" id="pane-{{ $lang->iso_code }}" role="tabpanel" aria-labelledby="tab-{{ $lang->iso_code }}">
                                <div class="form-group{{ $errors->has('langs.' . $lang->iso_code) ? ' has-error' : '' }}">
                                    <input id="lang-{{ $lang->id_lang }}" type="text" class="form-control" name="langs[{{ $lang->iso_code }}]" value="{{ old('langs.' . $lang->iso_code, $lang->pivot->name) }}" required autofocus>
            
                                    @if ($errors->has('langs.' . $lang->iso_code))
                                        <small class="help-block text-danger">
                                            <strong>{{ $errors->first('langs.' . $lang->iso_code) }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div> 
                        @endforeach
                    </div>{{-- #lang-panes --}}
                </div>{{-- .form-group --}}
                
                <div class="form-group{{ $errors->has('id_category') ? ' has-error' : '' }}">
                    <label for="id-category" class="control-label">{{ trans('admin/category/edit.content.div0.category') }}:</label>
                    <input id="id-category" type="text" class="form-control" name="id_category" required autofocus value="{{ old('id_category', $category->id_category) }}" data-route="{{ route('categories-admin.check-category', ':CATEGORY_ID') }}">
                    <div class="valid-feedback">
                        {{ trans('admin/category/edit.content.div0.available') }}
                    </div>
                    <div class="invalid-feedback" id="category-unavailable">
                        {{ trans('admin/category/edit.content.div0.unavailable') }}
                    </div>
                    <div class="invalid-feedback" id="category-error" hidden>
                        {{ trans('admin/category/edit.content.div0.server') }}
                    </div>

                    @if ($errors->has('id_category'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('id_category') }}</strong>
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">{{ trans('admin/category/edit.content.div1.active') }}:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-toggle btn-toggle-success {{ old('active', $category->active) == "1" ? 'active' : '' }}">
                            <input type="radio" name="active" id="active-1" autocomplete="off" value="1" {{ old('active', $category->active) == "1" ? 'checked' : '' }}>{{ trans('admin/category/edit.content.div1.yes') }}
                        </label>
                        <label class="btn btn-toggle btn-toggle-danger {{ old('active', $category->active) == "0" ? 'active' : '' }}">
                            <input type="radio" name="active" id="active-0" autocomplete="off" value="0" {{ old('active', $category->active) == "0" ? 'checked' : '' }}>{{ trans('admin/category/edit.content.div1.no') }}
                        </label>
                    </div>
                    @if ($errors->has('active'))
                        <div class="form-check">
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('active') }}</strong>
                            </small>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">{{ trans('admin/category/edit.content.div2.parent') }}:</label>
                    <ul id="tree-cat">
                        <li>
                            @if(count($rootCategory->childs))
                                <input type="radio" name="id_parent" id="category-{{ $rootCategory->id_category }}" value="{{ $rootCategory->id_category }}" {{ old('id_parent', $category->id_parent) == $rootCategory->id_category ? 'checked' : '' }}>
                                @if (old('id_parent', $category->id_parent) != 1)
                                    <i class="fas fa-folder-open"></i>
                                @else
                                    <i class="fas fa-folder"></i>
                                @endif
                                <button class="btn">{{ trans('admin/category/edit.content.div2.home') }}</button>
                                @include('admin.categories.category-child-edit', ['childs' => $rootCategory->childs])
                            @else
                                <input type="radio" name="id_parent" id="category-{{ $rootCategory->id_category }}" value="{{ $rootCategory->id_category }}" {{ old('id_parent', $category->id_parent) == $rootCategory->id_category ? 'checked' : '' }}>
                                {{ trans('admin/category/edit.content.div2.home') }}
                            @endif
                        </li>
                    </ul>
                    @if ($errors->has('id_parent'))
                        <div class="form-check">
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('id_parent') }}</strong>
                            </small>
                        </div>
                    @endif
                </div>
            </div>{{-- .card-body --}}
            <footer class="card-footer d-flex justify-content-end">
                <a href="{{ route('categories-admin.index') }}" class="btn btn-link mr-1">
                    <i class="fas fa-arrow-circle-left"></i>{{ trans('admin/category/edit.content.footer.back') }}
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check-circle"></i>{{ trans('admin/category/edit.content.footer.edit') }} {{ $category->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}
                </button>
            </footer>
        </form>
    </div>{{-- .card box-content-admin p-3 mb-3 --}}
@endsection

@section('scripts')
    <script type="application/javascript">
        $('.nav-tabs li:first-child a').addClass('active');
        $('.tab-content .tab-pane:first-child').addClass('show active');

        $('input[name^="langs"]').on("blur", function () {
            var inputValue = $(this).val();
            $('input[name^="langs"]').each(function() {
                if ($(this).val() === null || $(this).val() === '') {
                    $(this).val(inputValue);
                }
            });
        });

        $.fn.extend({
            treed: function (o) {

                var openedClass = 'fa-folder-open';
                var closedClass = 'fa-folder';

                if (typeof o != 'undefined') {
                    if (typeof o.openedClass != 'undefined') {
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined') {
                        closedClass = o.closedClass;
                    }
                }

                /* initialize each of the top levels */
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this);
                    branch.prepend("");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    });
                    @if (old('id_parent', $category->id_parent) != 1)
                    branch.children().children();
                    @else
                    branch.children().children().toggle(); //Quitar el comportamiento cerrado al inicio
                    @endif
                });
                tree.find('li').not('.branch').each(function(){
                    $(this).find('input').after(' <i class="far fa-folder"></i>');
                });
                /* fire event from the dynamically added icon */
                tree.find('.branch .indicator').each(function () {
                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
                /* fire event to open branch if the li contains an anchor instead of text */
                tree.find('.branch>a').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
                /* fire event to open branch if the li contains a button instead of text */
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });
        /* Initialization of treeviews */
        $('#tree-cat').treed();
    </script>
@endsection