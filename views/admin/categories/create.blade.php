@extends('layouts.admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('categoryCreate') }}
@endsection

{{-- SECTION TITLE --}}
@section('title',  trans('admin/category/create.title'))

@section('content')
    <div class="box-content-admin mb-3">
        <form id="category-form" class="form-horizontal" method="POST" action="{{ route('categories-admin.store') }}">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ trans('admin/category/create.content.name') }}:</label>
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($langs as $lang)
                            <li class="nav-item">
                                <a class="nav-link" id="tab-{{ $lang->iso_code }}" data-toggle="tab"
                                   href="#pane-{{ $lang->iso_code }}" role="tab" aria-controls="{{ $lang->iso_code }}"
                                   aria-selected="true">{{ $lang->iso_code }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="lang-panes">
                        @foreach($langs as $lang)
                            <div class="tab-pane fade" id="pane-{{ $lang->iso_code }}" role="tabpanel"
                                 aria-labelledby="tab-{{ $lang->iso_code }}">
                                <div class="form-group{{ $errors->has('langs.' . $lang->iso_code) ? ' has-error' : '' }}">
                                    <input id="lang-{{ $lang->id_lang }}" type="text" class="form-control"
                                           name="langs[{{ $lang->iso_code }}]"
                                           value="{{ old('langs.' . $lang->iso_code) }}" required autofocus>

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
                    <label for="id-category"
                           class="control-label">{{ trans('admin/category/create.content.div0.category') }}:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="category-parent">
                                @if(old('id_parent', $idParent))
                                    {{ old('id_parent', $idParent) != 1 ? old('id_parent', $idParent) : trans('admin/category/create.content.div0.home') }}
                                @else
                                    {{ trans('admin/category/create.content.div0.home') }}
                                @endif
                            </div>
                        </div>
                        <input id="id-category" type="text" class="form-control" name="id_category"
                               required autofocus
                               data-route="{{ route('categories-admin.check-category', ':CATEGORY_ID') }}">
                        <div class="valid-feedback">
                            {{ trans('admin/category/create.content.div0.available') }}
                        </div>
                        <div class="invalid-feedback" id="category-unavailable">
                            {{ trans('admin/category/create.content.div0.unavailable') }}
                        </div>
                        <div class="invalid-feedback" id="category-error" hidden>
                            {{ trans('admin/category/create.content.div0.server') }}
                        </div>
                    </div>

                    @if ($errors->has('id_category'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('id_category') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">{{ trans('admin/category/create.content.div1.active') }}:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @if (old('active') || old('active') == "0")
                            <label class="btn btn-toggle btn-toggle-success {{ old('active') == "1" ? 'active' : '' }}">
                                <input type="radio" name="active" id="active-1" autocomplete="off"
                                       value="1" {{ old('active') == "1" ? 'checked' : '' }}>{{ trans('admin/category/create.content.div1.yes') }}
                            </label>
                            <label class="btn btn-toggle btn-toggle-danger {{ old('active') == "0" ? 'active' : '' }}">
                                <input type="radio" name="active" id="active-0" autocomplete="off"
                                       value="0" {{ old('active') == "0" ? 'checked' : '' }}>{{ trans('admin/category/create.content.div1.no') }}
                            </label>
                        @else
                            <label class="btn btn-toggle btn-toggle-success active">
                                <input type="radio" name="active" id="active-1" autocomplete="off" value="1" checked>
                                {{ trans('admin/category/create.content.div1.yes') }}
                            </label>
                            <label class="btn btn-toggle btn-toggle-danger">
                                <input type="radio" name="active" id="active-0" autocomplete="off" value="0">
                                {{ trans('admin/category/create.content.div1.no') }}
                            </label>
                        @endif
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
                    <label class="control-label">{{ trans('admin/category/create.content.div2.parent') }}:</label>
                    @if (old('id_parent', $idParent))
                        <ul id="tree-cat">
                            <li>
                                @if(count($rootCategory->childs))
                                    <input type="radio" name="id_parent"
                                           id="category-{{ $rootCategory->id_category }}"
                                           value="{{ $rootCategory->id_category }}" {{ old('id_parent', $idParent) == $rootCategory->id_category ? 'checked' : '' }}>
                                    <i class="indicator fas fa-folder-open"></i>
                                    <button class="btn">{{ trans('admin/category/create.content.div0.home') }}</button>
                                    @include('admin.categories.category-child-create', ['childs' => $rootCategory->childs])
                                @else
                                    <input type="radio" name="id_parent"
                                           id="category-{{ $rootCategory->id_category }}"
                                           value="{{ $rootCategory->id_category }}" {{ old('id_parent', $idParent) == $rootCategory->id_category ? 'checked' : '' }}>
                                    {{ trans('admin/category/create.content.div0.home') }}
                                @endif
                            </li>
                        </ul>
                    @else
                        <ul id="tree-cat">
                            <li>
                                @if(count($rootCategory->childs))
                                    <input type="radio" name="id_parent" id="category-{{ $rootCategory->id_category }}"
                                           value="{{ $rootCategory->id_category }}" checked>
                                    <i class="indicator fas fa-folder"></i>
                                    <button class="btn">
                                        {{ trans('admin/category/create.content.div0.home') }}
                                    </button>
                                    @include('admin.categories.category-child-create', ['childs' => $rootCategory->childs])
                                @else
                                    <input type="radio" name="id_parent" id="category-{{ $rootCategory->id_category }}"
                                           value="{{ $rootCategory->id_category }}" checked>
                                    {{ trans('admin/category/create.content.div0.home') }}
                                @endif
                            </li>
                        </ul>
                    @endif
                    @if ($errors->has('id_parent'))
                        <div class="form-check">
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('id_parent') }}</strong>
                            </small>
                        </div>
                    @endif
                </div>
            </div>{{-- .card-body--}}
            <footer class="card-footer d-flex justify-content-end">
                <a href="{{ route('categories-admin.index') }}" class="btn btn-link mr-1">
                    <i class="fas fa-arrow-circle-left"></i>{{ trans('admin/category/create.content.footer.back') }}
                </a>
                <button type="submit" class="btn btn-primary">
                    {{ trans('admin/category/create.content.footer.create') }}
                </button>
            </footer>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="application/javascript">
        $('.nav-tabs li:first-child a').addClass('active');
        $('.tab-content .tab-pane:first-child').addClass('show active');

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
                    @if (old('id_parent', $idParent))
                    branch.children().children();
                    @else
                    branch.children().children().toggle(); //Quitar el comportamiento cerrado al inicio
                    @endif
                });
                tree.find('li').not('.branch').each(function () {
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

        $("#id-category").on("blur", function () {
            checkCategory();
        });

        $('input[name^="langs"]').on("blur", function () {
            var inputValue = $(this).val();
            $('input[name^="langs"]').each(function () {
                if ($(this).val() === null || $(this).val() === '') {
                    $(this).val(inputValue);
                }
            });
        });

        $('input[type=radio][name=id_parent]').change(function () {
            let categoryParentValue = $(this).val();
            if (parseInt(categoryParentValue) === 1) {
                $("#category-parent").text("Home");
            } else {
                $("#category-parent").text(this.value);
            }
            checkCategory();
        });

        $("#category-form").on('submit', function () {
            var categoryValue = $("#id-category").val();
            var categoryParentValue = $('input[type=radio][name=id_parent]:checked').val();
            var category;
            if (parseInt(categoryParentValue) === 1) {
                category = parseInt(categoryValue);
            } else {
                category = parseInt(categoryParentValue + categoryValue);
            }
            $("#id-category").val(category);
        });

        /* Función usada para determinar si existe la categoría en la BDD */
        function checkCategory() {
            var categoryValue = $("#id-category").val();
            var categoryParentValue = $('input[type=radio][name=id_parent]:checked').val();
            var category;
            /* ID que se buscará en la BDD para determinar si existe o no */
            if (parseInt(categoryParentValue) === 1) {
                category = parseInt(categoryValue);
            } else {
                category = parseInt(categoryParentValue + categoryValue);
            }
            /* Ruta usada para la consulta en la BDD */
            var url = $("#id-category").data('route').replace(':CATEGORY_ID', category);

            $.get(url, function (result) {
                if (result.flag) {
                    $(':input[type="submit"]').attr("disabled", true);
                    $("#category-error").attr("hidden", true);
                    $("#category-unavailable").attr("hidden", false);
                    $("#id-category").removeClass("is-valid").addClass("is-invalid");
                } else {
                    $(':input[type="submit"]').attr("disabled", false);
                    $("#id-category").removeClass("is-invalid").addClass("is-valid");
                }
            }).fail(function () {
                $(':input[type="submit"]').attr("disabled", true);
                $("#category-unavailable").attr("hidden", true);
                $("#category-error").attr("hidden", false);
                $("#id-category").removeClass("is-valid").addClass("is-invalid");
            });
        }
    </script>
@endsection