@extends('layouts.myrobock')

@section('title', "Create product")

@section('breadcrumbs')
    {{ Breadcrumbs::render('productsCreate') }}
@endsection

@section('form')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        @if($errors->any())
            <div class="alert alert-danger">
                <p class="alert-heading mb-0"><i class="fas fa-exclamation-circle"></i> <strong>We found a
                        problem.</strong> Please, check the errors below:</p>
            </div>
        @endif
        <form id="product-form" class="form-horizontal" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
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
                                <div class="form-group{{ $errors->has('names.' . $lang->iso_code) ? ' has-error' : '' }}">
                                    <label for="name-{{ $lang->id_lang }}">Name:</label>
                                    <input id="name-{{ $lang->id_lang }}" type="text" class="form-control"
                                           name="names[{{ $lang->iso_code }}]" placeholder="My awesome product"
                                           value="{{ old('names.' . $lang->iso_code) }}" required autofocus>

                                    @if ($errors->has('names.' . $lang->iso_code))
                                        <small class="help-block text-danger">
                                            <strong>{{ $errors->first('names.' . $lang->iso_code) }}</strong>
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('descriptions.' . $lang->iso_code) ? ' has-error' : '' }}">
                                    <label for="description-{{ $lang->id_lang }}">Description:</label>
                                    <textarea id="description-{{ $lang->id_lang }}" class="form-control"
                                              name="descriptions[{{ $lang->iso_code }}]">{{ old('descriptions.' . $lang->iso_code) }}</textarea>

                                    @if ($errors->has('descriptions.' . $lang->iso_code))
                                        <small class="help-block text-danger">
                                            <strong>{{ $errors->first('descriptions.' . $lang->iso_code) }}</strong>
                                        </small>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>{{-- #lang-panes --}}
                </div>{{-- .form-group --}}

                <div class="form-group">
                    <label class="control-label">Active:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @if (old('active') || old('active') == "0")
                            <label class="btn btn-toggle btn-toggle-success {{ old('active') == "1" ? 'active' : '' }}">
                                <input type="radio" name="active" id="active-1" autocomplete="off"
                                       value="1" {{ old('active') == "1" ? 'checked' : '' }}>Yes
                            </label>
                            <label class="btn btn-toggle btn-toggle-danger {{ old('active') == "0" ? 'active' : '' }}">
                                <input type="radio" name="active" id="active-0" autocomplete="off"
                                       value="0" {{ old('active') == "0" ? 'checked' : '' }}>No
                            </label>
                        @else
                            <label class="btn btn-toggle btn-toggle-success active">
                                <input type="radio" name="active" id="active-1" autocomplete="off" value="1" checked>
                                Yes
                            </label>
                            <label class="btn btn-toggle btn-toggle-danger">
                                <input type="radio" name="active" id="active-0" autocomplete="off" value="0">
                                No
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
                    <label for="id-product-condition" class="control-label">Condition:</label>
                    @if (old('id_product_condition'))
                        <select id="id-product-condition" class="form-control" name="id_product_condition"
                                required="required">
                            <option value="" disabled>Choose an option...</option>
                            @foreach ($productsConditions as $id_product_condition => $name)
                                <option value="{{ $id_product_condition }}" {{ old('id_product_condition') == $id_product_condition ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    @else
                        <select id="id-product-condition" class="form-control" name="id_product_condition"
                                required="required">
                            <option selected="selected" value="" disabled>Choose an option...</option>
                            @foreach ($productsConditions as $id_product_condition => $name)
                                <option value="{{ $id_product_condition }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="price" class="control-label">Price:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}"
                               placeholder="999.99"
                               required autofocus>
                        <div class="invalid-feedback">
                            Please enter a valid price
                        </div>
                    </div>

                    @if ($errors->has('price'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('price') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label for="quantity" class="control-label">Quantity:</label>
                    <input id="quantity" type="text" class="form-control" name="quantity"
                           value="{{ old('quantity') }}"
                           placeholder="12"
                           required autofocus>
                    <div class="invalid-feedback">
                        Please enter a valid quantity
                    </div>

                    @if ($errors->has('quantity'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('quantity') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('wholesale_price') ? ' has-error' : '' }}">
                    <label for="wholesale-price" class="control-label">Wholesale price:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input id="wholesale-price" type="text" class="form-control" name="wholesale_price"
                               value="{{ old('wholesale_price') }}"
                               placeholder="999999.99">
                        <div class="invalid-feedback">
                            Please enter a valid wholesale price
                        </div>
                    </div>

                    @if ($errors->has('wholesale_price'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('wholesale_price') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('wholesale_quantity') ? ' has-error' : '' }}">
                    <label for="wholesale-quantity" class="control-label">Wholesale quantity:</label>
                    <input id="wholesale-quantity" type="text" class="form-control" name="wholesale_quantity"
                           value="{{ old('wholesale_quantity') }}"
                           placeholder="12">
                    <div class="invalid-feedback">
                        Please enter a valid wholesale quantity
                    </div>

                    @if ($errors->has('wholesale_quantity'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('wholesale_quantity') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group" id="categories-selector"
                     data-route="{{ route('products.find-child-category', ':ID_CATEGORY') }}">
                    <span id="category-selected">Select a category</span>
                    <select id="level-0" class="custom-select category-select mb-3" size="10" required="required"
                            data-index="0">
                        @foreach ($categories as $id_category => $name)
                            <option value="{{ $id_category }}">{{ $name }}</option>
                        @endforeach
                    </select>

                    @if($errors->any())
                        <small class="help-block text-danger">
                            <strong>Please choose the category again</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="id-product-manufacturer" class="control-label">Manufacturer:</label>
                    @if (old('id_product_manufacturer'))
                        <select id="id-product-manufacturer" class="form-control" name="id_product_manufacturer">
                            <option value="" disabled>Choose an option...</option>
                            @foreach ($productsManufacturers as $id_product_manufacturer => $name)
                                <option value="{{ $id_product_manufacturer }}" {{ old('id_product_manufacturer') == $id_product_manufacturer ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    @else
                        <select id="id-product-manufacturer" class="form-control" name="id_product_manufacturer">
                            <option selected="selected" value="" disabled>Choose an option...</option>
                            @foreach ($productsManufacturers as $id_product_manufacturer => $name)
                                <option value="{{ $id_product_manufacturer }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('width') ? ' has-error' : '' }}">
                    <label for="width" class="control-label">Package width:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CM</span>
                        </div>
                        <input id="width" type="text" class="form-control" name="width" value="{{ old('width') }}"
                               placeholder="0.00">
                        <div class="valid-feedback" id="widthSuccess">
                            The product width is equal to <span></span> inches
                        </div>
                        <div class="invalid-feedback" id="widthError">
                            Please enter a valid value
                        </div>
                    </div>

                    @if ($errors->has('width'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('width') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                    <label for="height" class="control-label">Package height:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CM</span>
                        </div>
                        <input id="height" type="text" class="form-control" name="height" value="{{ old('height') }}"
                               placeholder="0.00">
                        <div class="valid-feedback" id="heightSuccess">
                            The product height is equal to <span></span> inches
                        </div>
                        <div class="invalid-feedback" id="heightError">
                            Please enter a valid value
                        </div>
                    </div>

                    @if ($errors->has('height'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('height') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('depth') ? ' has-error' : '' }}">
                    <label for="depth" class="control-label">Package depth:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CM</span>
                        </div>
                        <input id="depth" type="text" class="form-control" name="depth" value="{{ old('depth') }}"
                               placeholder="0.00">
                        <div class="valid-feedback" id="depthSuccess">
                            The product depth is equal to <span></span> inches
                        </div>
                        <div class="invalid-feedback" id="depthError">
                            Please enter a valid value
                        </div>
                    </div>

                    @if ($errors->has('depth'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('depth') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                    <label for="weight" class="control-label">Package weight:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">KGS</span>
                        </div>
                        <input id="weight" type="text" class="form-control" name="weight" value="{{ old('weight') }}"
                               placeholder="0.00">
                        <div class="valid-feedback" id="weightSuccess">
                            The product weight is equal to <span></span> lbs
                        </div>
                        <div class="invalid-feedback" id="weightError">
                            Please enter a valid value
                        </div>
                    </div>

                    @if ($errors->has('weight'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('weight') }}</strong>
                        </small>
                    @endif
                </div>
                {{-- Bootstrap-fileinput --}}
                <div class="form-group">
                    <div class="file-loading">
                        <input id="image-file" name="images[]" class="file" type="file" multiple accept="image/*">
                    </div>

                    @if($errors->any())
                        <small class="help-block text-danger">
                            <strong>Please upload the images again</strong>
                        </small>
                    @endif
                </div>
            </div>{{-- .card-body--}}
            <footer class="card-footer d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-link mr-1">
                    <i class="fas fa-arrow-circle-left"></i> Back to products list
                </a>
                <button type="submit" class="btn btn-primary">
                    Create product
                </button>
            </footer>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="application/javascript">
        $('.nav-tabs li:first-child a').addClass('active');
        $('.tab-content .tab-pane:first-child').addClass('show active');

        $('input[name^="names"]').on("blur", function () {
            var inputValue = $(this).val().trim();
            $('input[name^="names"]').each(function () {
                if (!$(this).val().trim()) {
                    $(this).val(inputValue);
                }
            });
        });

        $(document).on('change', '.category-select', function () {
            var context = '#categories-selector';
            let idCategory = $(this).val();
            let url = $(context).data('route').replace(':ID_CATEGORY', idCategory);

            //Eliminar selects del DOM
            if ($(context + ' > select').last().data('index')) {
                let position = $(this).next().data('index');
                let lastPosition = $(context + ' > select').last().data('index');
                if (position !== undefined) {
                    for (position; position <= lastPosition; position++) {
                        $('#level-' + position).remove();
                    }
                }
            }

            $.ajax({
                url: url,
                method: "GET",
                dataType: 'json'
            }).done(data => {
                if (!data.endChildCategory) {
                    let levelDepth = $(this).data('index') + 1;
                    let options = "";
                    for (let idCategory in data.categories) {
                        options += "<option value='" + idCategory + "'>" + data.categories[idCategory] + "</option>";
                    }
                    $("<select id='level-" + levelDepth + "' class='custom-select category-select mb-3' size='10' required='required' data-index='" + levelDepth + "'>" + options + "</select>").insertAfter($(context + ' > select').last());
                } else {
                    $(context + ' > select').last().prop('name', 'id_category');
                    alert('No hay más categorías');
                }

                //Escritura de la etiqueta span
                let stringCategories = $('#level-0').find('option:selected').text();
                let newLastPosition = $(context + ' > select').last().data('index');
                for (let i = 1; i <= newLastPosition; i++) {
                    let context = '#level-';
                    if ($(context + i).find('option:selected').text()) {
                        stringCategories += " > " + $(context + i).find('option:selected').text();
                    }
                }
                $('#category-selected').text(stringCategories);
            }).fail(function () {
                $('#category-selected').text('Server error, please try again!');
            });
        });

        // Constantes globales
        const INCH = 0.393701;
        const POUND = 2.20462;

        // ID de los inputs usado para los contextos
        let priceContext = '#price';
        let quantityContext = '#quantity';
        let wholesalePriceContext = '#wholesale-price';
        let wholesaleQuantityContext = '#wholesale-quantity';
        let widthContext = '#width';
        let heightContext = '#height';
        let depthContext = '#depth';
        let weightContext = '#weight';

        // Bloqueo de teclas
        $(priceContext + ', ' + wholesalePriceContext + ', ' + widthContext + ', ' + heightContext + ', ' + depthContext + ', ' + weightContext).on('keypress', function (key) {
            if (key.charCode < 46 && key.charCode !== 0 || key.charCode > 57 || key.charCode === 47) return false;
        });

        $(quantityContext + ', ' + wholesaleQuantityContext).on('keypress', function (key) {
            if (key.charCode < 48 && key.charCode !== 0 || key.charCode > 57) return false;
        });

        // Verificar si el campo price, wholesale-price, quantity y wholesale-quantity es un número
        $(priceContext + ', ' + wholesalePriceContext + ', ' + quantityContext + ', ' + wholesaleQuantityContext).on('keyup', function () {
            checkIsANumber.call(this);
        });

        $(priceContext + ', ' + wholesalePriceContext).on('blur', function () {
            checkIsANumber.call(this);
            if ($(this).val().trim() && !isNaN($(this).val().trim())) {
                $(this).val(parseFloat($(this).val().trim()).toFixed(2));
            }
        });

        $(quantityContext + ', ' + wholesaleQuantityContext).on('blur', function () {
            checkIsANumber.call(this);
            if ($(this).val().trim() && !isNaN($(this).val().trim())) {
                $(this).val(parseInt($(this).val().trim()));
            }
        });

        function checkIsANumber() {
            let inputValue = $(this).val().trim();
            if (!inputValue || !isNaN(inputValue)) {
                $(this).removeClass('is-invalid');
            } else {
                $(this).addClass('is-invalid');
            }
        }

        // Eventos para el campo width, height y depth
        $(widthContext + ', ' + heightContext + ', ' + depthContext).on('keyup', function () {
            calculateInputValue.toInches.call(this);
        });

        $(widthContext + ', ' + heightContext + ', ' + depthContext).on('blur', function () {
            calculateInputValue.toInches.call(this);
            if ($(this).val().trim() && !isNaN($(this).val().trim())) {
                $(this).val(parseFloat($(this).val().trim()).toFixed(2));
            }
        });

        // Eventos para el campo weight
        $(weightContext).on('keyup', function () {
            calculateInputValue.toPounds.call(this);
        });

        $(weightContext).on('blur', function () {
            calculateInputValue.toPounds.call(this);
            if ($(this).val().trim() && !isNaN($(this).val().trim())) {
                $(this).val(parseFloat($(this).val().trim()).toFixed(2));
            }
        });

        let calculateInputValue = {
            toInches: function() {
                let inputValue = $(this).val().trim();
                if (inputValue && !isNaN(inputValue)) {
                    let inputValueInInches = (parseFloat(inputValue) * INCH).toFixed(2);
                    $('#' + this.name + 'Success').find('span').text(inputValueInInches);
                    $(this).removeClass('is-invalid').addClass('is-valid');
                } else if (isNaN(inputValue)) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-valid is-invalid');
                }
            },
            toPounds: function() {
                let inputValue = $(this).val().trim();
                if (inputValue && !isNaN(inputValue)) {
                    let inputValueInPounds = (parseFloat(inputValue) * POUND).toFixed(2);
                    $('#' + this.name + 'Success').find('span').text(inputValueInPounds);
                    $(this).removeClass('is-invalid').addClass('is-valid');
                } else if (isNaN(inputValue)) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-valid is-invalid');
                }
            }
        };

        //Configuración del bootstrap-fileinput
        //Ver mas en: http://plugins.krajee.com/file-input
        $("#image-file").fileinput({
            //language: 'es',
            theme: 'fas',
            browseOnZoneClick: true,
            dropZoneClickTitle: '<br>(or click to select images)',
            showUpload: false,
            showClose: false,
            msgPlaceholder: "Select images for upload...",
            maxFileCount: 6,
            allowedFileExtensions: ['jpg', 'png', 'bmp', 'jpeg', 'gif'],
            maxFileSize: 2048,
        });
    </script>
@endsection