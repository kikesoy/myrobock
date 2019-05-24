@extends('layouts.myrobock')

{{--PAGE TITLE--}}
@section('title', $category->name)

@section('content')
    <div id="products-container" class="container-fluid products">
        <div class="row">
            <aside class="prods-filters-toggle">
                <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                        data-target="#filtersOptions" aria-expanded="false" aria-controls="filtersOptions">Filters <i
                            class="fas fa-caret-down"></i></button>
            </aside>
            <aside class="col-md-3 col-lg-2 prods-filters collapse" id="filtersOptions">
                <div class="filter-container filter-deals">
                    <h5>Deals & Promos</h5>
                    <ul>
                        <li><a href="">Ofertas</a></li>
                        <li><a href="">En remate</a></li>
                        <li><a href="">Especial de enero</a></li>
                    </ul>
                </div>
                @if(count($category->childs))
                    <div class="filter-container filter-categories">
                        <h5>Categories</h5>
                        <ul>
                            @foreach($category->childs as $child)
                                <li>
                                    <a href="#">{{ $child->langs()->wherePivot('id_lang', 2)->first()->pivot->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>{{--.filter-categories--}}
                @endif
                <h4>Refine by</h4>
                @if(count($manufacturers))
                    <div class="filter-container filter-brand">
                        <h5>Brands</h5>
                        <ul>
                            @foreach($manufacturers as $index => $manufacturer)
                                <li>
                                    <a href="#">{{ $manufacturer }}</a>
                                </li>
                            @endforeach
                            <li>
                                <a href="#">See all brands</a>
                            </li>
                        </ul>
                    </div>{{--.filter-brand--}}
                @endif

                <div class="filter-container filter-vehicle">
                    <h5>Vehicle</h5>
                    <ul>
                        <li><a href="">Cars</a></li>
                        <li><a href="">Trucks</a></li>
                        <li><a href="">Heavy Duty</a></li>
                        <li><a href="">Marine</a></li>
                    </ul>
                </div>{{--.filter-categories--}}

                <div class="filter-container filter-rating">
                    <h5>Customer Rating</h5>
                    <ul>
                        <li><a href=""><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i></a></li>
                        <li><a href=""><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="far fa-star"></i></a></li>
                        <li><a href=""><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="far fa-star"></i><i class="far fa-star"></i></a></li>
                        <li><a href=""><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i
                                        class="far fa-star"></i><i class="far fa-star"></i></a></li>
                        <li><a href=""><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                                        class="far fa-star"></i><i class="far fa-star"></i></a></li>
                    </ul>
                </div>{{--.filter-rating--}}

                <div class="filter-container filter-locatio">
                    <h5>Location</h5>
                    <ul>
                        <li><a href="">U.S.A.</a></li>
                        <li><a href="">Canada</a></li>
                        <li><a href="">China</a></li>
                        <li><a href="">Venezuela</a></li>
                        <li><a href="">Panama</a></li>
                        <li><a href="">See all locations</a></li>
                    </ul>
                </div>{{--.filter-categories--}}

                <div class="filter-container filter-price">
                    <h5>Price</h5>
                    <ul>
                        <li><a href="">Under $25</a></li>
                        <li><a href="">$25 to $50</a></li>
                        <li><a href="">$50 to $100</a></li>
                        <li><a href="">$100 to $200</a></li>
                        <li><a href="">$200 & More</a></li>
                        <li>
                            <form class="form-inline">
                                <input type="text" class="form-control" id="priceMin" placeholder="$ Min">
                                <input type="text" class="form-control" id="priceMax" placeholder="$ Max">
                                <button type="submit" class="btn btn-primary">Go</button>
                            </form>
                        </li>
                    </ul>
                </div>{{--.filter-categories--}}
            </aside>
            <section class="col-md-9 col-lg-10 prods-list">
                <section class="row prods-list-banner">
                    <a class="col-12 col-banner" href="">
                        <img class="img-fluid"
                             src="https://via.placeholder.com/1800x250/660000/FFFFFF?text=Banner-Products" alt="">
                    </a>
                </section>{{-- .prods-list-banner --}}
                <section class="prods-sorting">
                    <form class="form-inline prods-sorting-sort">
                        <label for="sort-products">
                            {{ ($products->currentpage() - 1) * $products->perpage() + 1 }}
                            -{{ (($products->currentpage() - 1) * $products->perpage()) + $products->count() }}
                            of {{ $products->total() }} results for {{ $category->name }}
                        </label>
                        <select class="form-control form-control-sm" id="sort-products">
                            <option>Price: Lower first</option>
                            <option>Price: Higher first</option>
                            <option>Featured</option>
                            <option>Best ratings</option>
                        </select>
                    </form>
                    <div class="prods-sorting-view">
                        View as: <a href="#" class="prods-sorting-view-btn view-grid" data-view="grid"><i
                                    class="fas fa-th-large"></i></a> <a href="#"
                                                                        class="prods-sorting-view-btn view-list"
                                                                        data-view="list"><i class="fas fa-list"></i></a>
                    </div>
                </section>
                <section class="row prods-list-list set-grid" data-viewtype="grid">
                    @foreach($products as $product)
                        {{-- ARTICULO --}}
                        <article class="prods-list-item">
                            <a href="{{ route('product.show', [$product->category->slug, $product->id_product, $product->slug]) }}"
                               class="item-link">
                                <header class="item-header">
                                    <img src="{{ $product->images->where('cover', 1)->first()->image_path_m }}"
                                         class="item-img" alt="{{ $product->name }}">
                                </header>
                                <section class="item-body">
                                    <div class="description">
                                        {{ $product->name }}
                                    </div>
                                    <div class="price">
                                        @if($product->wholesale_price !== null)
                                            <div class="price-now">
                                                <span class="price-min"><small
                                                            class="currency">$</small>{{ $product->wholesale_price_format }}</span>
                                                - <span class="price-max"><small
                                                            class="currency">$</small>{{ $product->price_format }}</span>
                                            </div>
                                            <div class="price-old">
                                                <small class="currency">$</small>
                                                123.45 -
                                                <small class="currency">$</small>
                                                234.56
                                            </div>
                                        @else
                                            <div class="price-now">
                                                <span class="price-max"><small
                                                            class="currency">$</small>{{ $product->price_format }}</span>
                                            </div>
                                            <div class="price-old">
                                                <small class="currency">$</small>
                                                123.45 -
                                                <small class="currency">$</small>
                                                234.56
                                            </div>
                                        @endif
                                    </div>{{--.price--}}
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <span class="average">3.5 Avg.</span>
                                    </div>{{--.rating--}}
                                    <div class="seller">
                                        <div class="sales">
                                            1234 vendidos
                                        </div>
                                        <div class="seller-type">
                                            <i class="fas fa-award"></i>
                                        </div>
                                    </div>{{--.seller--}}
                                </section>
                            </a>
                            <footer class="item-footer">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1">
                                        <div class="input-group-append" id="button-addon4">
                                            <button class="btn btn-primary" type="button">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            </footer>
                        </article>
                        {{-- FIN ARTICULO --}}
                    @endforeach
                </section>{{-- .prods-list-list --}}
                <nav aria-label="Page navigation example">
                    <div>
                        {{ ($products->currentpage() - 1) * $products->perpage() + 1 }}
                        -{{ (($products->currentpage() - 1) * $products->perpage()) + $products->count() }}
                        of {{ $products->total() }} results for {{ $category->name }}
                    </div>
                    {{ $products->links('pagination::bootstrap-4',['class'=>'pagination-sm']) }}
                </nav>
            </section>{{-- .prods-list --}}
        </div>{{--.row--}}
    </div>
@endsection
{{-- USE THIS SECTION IF CONTENT IS A FORM IE: CREATE OR EDIT--}}
@section('scripts')
    <script type="text/javascript">
        // Funcion para cambiar la vista de los productos
        function viewType(displayType) {
            switch (displayType) {
                case 'list':
                    $('.prods-list-list').removeClass('set-grid').addClass('set-list').attr('data-viewtype', displayType);
                    $('.view-list').addClass('view-active');
                    $('.view-grid').removeClass('view-active');
                    break;
                case 'grid':
                    $('.prods-list-list').removeClass('set-list').addClass('set-grid').attr('data-viewtype', displayType);
                    $('.view-grid').addClass('view-active');
                    $('.view-list').removeClass('view-active');
                    break;
            }
        }

        // Funcionalidad de los botones para seleccionar las vistas
        function btnView(e) {
            const typeSelected = $(this).data('view');
            e.preventDefault();
            viewType(typeSelected);
        }

        // Verificacion inicial para saber cual vista fue seleccionada
        viewType($('.prods-list-list').data('viewtype'));

        // Boton para mostrar los productos como lista
        $('.view-list').click(btnView);

        // Boton para mostrar los productos como grilla
        $('.view-grid').click(btnView);

    </script>
@endsection