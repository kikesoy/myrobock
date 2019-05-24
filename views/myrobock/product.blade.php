@extends('layouts.myrobock')

{{--PAGE TITLE--}}
@section('title', $product->name)

@section('content')
    <div id="product-container" class="container-fluid">
        <div class="row">
            <section>

            </section>
        </div>
        <div class="row">
            <article class="product col-9">
                <section class="product-description">
                    @if(count($product->images) > 1)
                        <div class="product-thumbnails">
                            @foreach($product->images as $productImage)
                                <a href="#"><img src="{{ $productImage->image_path_xs }}" alt="{{ $product->name }}"
                                                 class="img-fluid"></a>
                            @endforeach
                        </div>
                    @endif

                    <figure class="product-image">
                        <img src="{{ $product->images->where('cover', 1)->first()->image_path_l }}"
                             alt="{{ $product->name }}" class="img-fluid">
                    </figure>

                    <div class="product-overview">
                        <h4>{{ $product->name }}</h4>
                        @if($product->wholesale_price !== null)
                            <h5 class="product-price">Today: US$ {{ $product->price_format }}
                                <small>(Min. Order: 1 piece)</small>
                            </h5>
                            <h6>US$ {{ $product->wholesale_price_format }}
                                <small>(From {{ $product->wholesale_quantity }} pieces)</small>
                            </h6>
                        @else
                            <h5 class="product-price">Today: US$ {{ $product->price_format }}
                                <small>(Min. Order: 1 piece)</small>
                            </h5>
                        @endif
                        <div class="product-rating">
                            <button class="btn dropdown-toggle" type="button" id="dropdownRating" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Rating: <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span class="average">From 7 Votes</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownRating">
                                <a href="#" class="dropdown-item"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i> | 5/5</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="far fa-star"></i> | 4/5</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i> | 3/5</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i> | 2/5</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i> | 1/5</a>
                                <a href="#" class="dropdown-item"><i class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i> | 0/5</a>
                            </div>
                        </div>{{--.product-rating--}}

                        <div class="product-details">
                            <h6>Highlights</h6>
                            @if($product->highlight)
                                <p>{{ $product->highlight->langs()->wherePivot('id_lang', 2)->first()->pivot->name }}</p>
                            @endif
                            <ul>
                                <li>100% marca nueva unidad de aftermarket</li>
                                <li>No remanufacturados</li>
                                <li>Cumple o supera especificaciones OEM para ajuste y rendimiento</li>
                            </ul>
                        </div>
                    </div>
                </section>{{-- .product-description --}}

                <section class="product-extend product-specifics">
                    <header class="product-extend-header">
                        <h4 class="header-title">Product Specifics</h4>
                    </header>
                    <div class="product-extend-container">
                        <p>{{ $product->description }}</p>
                    </div>
                </section>{{-- .product-specifics --}}

                <section class="product-extend product-compare">
                    <header class="product-extend-header">
                        <h4 class="header-title">Compare similar items</h4>
                        <span class="header-link"><a href="#"><i
                                        class="fas fa-plus-square"></i> More Similar products</a></span>
                    </header>
                    {{--Esto de abajo no cuadra mucho para recorrerlo--}}
                    <table class="product-extend-table">
                        <thead>
                        <tr>
                            <th class="current" scope="row">
                                <img src="{{ $product->images->where('cover', 1)->first()->image_path_m }}"
                                     alt="{{ $product->name }}" class="img-fluid">
                                <p>{{ $product->name }}</p>
                                <form action="">
                                    <button class="btn btn-sm btn-block btn-primary">Add to cart</button>
                                </form>
                            </th>
                            <td>
                                <img src="{{ asset('img/demo/16614N.jpg') }}" alt="" class="img-fluid">
                                <p>Denso 210 – 0699 Alternador</p>
                                <form action="">
                                    <button class="btn btn-sm btn-block btn-primary">Add to cart</button>
                                </form>
                            </td>
                            <td>
                                <img src="{{ asset('img/demo/16614N.jpg') }}" alt="" class="img-fluid">
                                <p>Denso 210 – 0699 Alternador</p>
                                <form action="">
                                    <button class="btn btn-sm btn-block btn-primary">Add to cart</button>
                                </form>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @if($product->wholesale_price !== null)
                                <th class="current" scope="row">US$ {{ $product->wholesale_price_format }} -
                                    US$ {{ $product->price_format }}</th>
                            @else
                                <th class="current" scope="row">US$ {{ $product->price_format }}</th>
                            @endif
                            <td>US$ 290.15</td>
                            <td>US$ 265.50</td>
                        </tr>
                        <tr>
                            <th class="current" scope="row"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                (10)
                            </th>
                            <td><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="far fa-star"></i> (4)
                            </td>
                            <td><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="far fa-star"></i><i class="far fa-star"></i> (9)
                            </td>
                        </tr>
                        <tr>
                            <th class="current" scope="row">Shipping: US$ 19.99</th>
                            <td>Shipping: US$ 19.99</td>
                            <td>Shipping: US$ 29.99</td>
                        </tr>
                        <tr>
                            <th class="current" scope="row">Location: Venezuela</th>
                            <td>Location: U.S.A.</td>
                            <td>Location: China</td>
                        </tr>
                        </tbody>
                    </table>
                </section>{{-- .product-compare --}}

                <section class="product-extend product-customers">
                    <header class="product-extend-header">
                        <h4 class="header-title">Customers also buy</h4>
                        <span class="header-link"><a href="#"><i
                                        class="fas fa-plus-square"></i> More Similar products</a></span>
                    </header>
                    <div class="product-extend-container">
                        @foreach($purchasedProducts as $purchasedProduct)
                            <article class="product-extend-item">
                                <a href="{{ route('product.show', [$purchasedProduct->category->slug, $purchasedProduct->id_product, $purchasedProduct->slug]) }}">
                                    <img src="{{ $purchasedProduct->images->where('cover', 1)->first()->image_path_m }}"
                                         alt="{{ $purchasedProduct->name }}">
                                    <div class="price">
                                        @if($purchasedProduct->wholesale_price !== null)
                                            <small class="currency">$
                                            </small>{{ $purchasedProduct->wholesale_price_format }} -
                                            <small class="currency">$</small>{{ $purchasedProduct->price_format }}
                                        @else
                                            <small class="currency">$</small>{{ $purchasedProduct->price_format }}
                                        @endif
                                    </div>
                                    <div class="description">
                                        {{ $purchasedProduct->name }}
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>{{-- .product-extend-container --}}
                </section>{{-- .product-customers --}}

                <section class="product-extend product-may-like">
                    <header class="product-extend-header">
                        <h4 class="header-title">You may like</h4>
                        <span class="header-link"><a href="#"><i
                                        class="fas fa-plus-square"></i> See more products</a></span>
                    </header>
                    <div class="product-extend-container">
                        @foreach($randomProducts as $randomProduct)
                            <article class="product-extend-item">
                                <a href="{{ route('product.show', [$randomProduct->category->slug, $randomProduct->id_product, $randomProduct->slug]) }}">
                                    <img src="{{ $randomProduct->images->where('cover', 1)->first()->image_path_m }}"
                                         alt="{{ $randomProduct->name }}">
                                    <div class="price">
                                        @if($randomProduct->wholesale_price !== null)
                                            <small class="currency">$
                                            </small>{{ $randomProduct->wholesale_price_format }} -
                                            <small class="currency">$</small>{{ $randomProduct->price_format }}
                                        @else
                                            <small class="currency">$</small>{{ $randomProduct->price_format }}
                                        @endif
                                    </div>
                                    <div class="description">
                                        {{ $randomProduct->name }}
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>{{-- .product-extend-container --}}
                </section>{{-- .product-may-like --}}
            </article>{{-- .product-customers --}}

            {{-- ASIDE --}}
            <aside class="product-cart col-3">
                <div class="product-cart-share">
                    <div class="share-links">
                        <a href="#"><i class="fas fa-envelope-square"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ __(url()->current()) }}"
                           target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="http://twitter.com/share?text={{ __('Denso 210 – 0699 Alternador') }}&url={{ __(url()->current()) }}"><i
                                    class="fab fa-twitter-square"></i></a>
                        <a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"
                           data-pin-custom="true"><i class="fab fa-pinterest-square"></i></a>
                    </div>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-heart"></i> add to favorites</a>
                </div>{{-- .product-share --}}

                <div class="product-cart-cart">
                    <div class="product-cart-availability"><span class="text-success"><i
                                    class="fas fa-check-circle"></i> {{ __('Disponible') }}</span> | 999999 Vendidos
                    </div>

                    <div class="product-cart-condition">
                        <strong>Condicion:</strong> {{ $product->condition->langs()->wherePivot('id_lang', 2)->first()->pivot->name }}
                    </div>

                    <form action="">
                        <h4 class="product-cart-price">US$ {{ $product->price_format }}</h4>

                        <div class="input-group product-cart-quantity">
                            <input type="text" class="form-control" placeholder="1" aria-label="Quantity"
                                   aria-describedby="add-cart">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="add-cart">Add to cart</button>
                            </div>
                        </div>
                    </form>
                </div>{{-- .product-cart-cart --}}

                <div class="product-cart-extend product-cart-favorites">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-flex btn-primary"><i class="fas fa-plus-square"></i>
                            Add to whislist
                        </button>
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">My special list</a>
                            <a class="dropdown-item" href="#">Heavy duty</a>
                            <a class="dropdown-item" href="#">Buy later</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Create a new list</a>
                        </div>
                    </div>
                </div>{{-- .product-cart-favorites --}}

                <div class="product-cart-extend product-cart-shipping">
                    <h6 class="extend-header">{{ __('Shipping') }}:</h6>
                    <p>US $22.52 DHL Express International | <a href="#">See details</a></p>
                    <p>Los artículos internacionales pueden estar sujetos a trámites de aduana y tarifas adicionales</p>
                    <p>Ubicación del artículo: Shangai, China</p>
                    <p>Realiza envíos a: todo el mundo</p>
                </div>{{-- .product-cart-shipping --}}

                <div class="product-cart-extend product-cart-payment-methods">
                    <h6 class="extend-header">{{ __('Payments') }}:</h6>
                    <i class="far fa-money-bill-alt"></i>
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-amex"></i>
                    <i class="fab fa-cc-discover"></i>
                    <i class="fab fa-cc-paypal"></i>


                </div>{{-- .product-cart-payment-methods --}}

                <div class="product-cart-extend product-cart-delivery">
                    <h6 class="extend-header">{{ __('Delivery') }}:</h6>
                    Varies for items shipped from an international location.
                </div>{{-- .product-cart-delivery --}}

                <div class="product-cart-extend product-cart-returns">
                    <h6 class="extend-header">{{ __('Returns') }}:</h6>
                    30 days, buyer pays return shipping | <a href="#">See details</a>
                </div>{{-- .product-cart-returns --}}

                <div class="product-cart-extend product-cart-sell">
                    <h6 class="extend-header">{{ __('Do you want to sell?') }}:</h6>
                    <a href="#" class="btn btn-sm btn-block btn-secondary">Sell in My Robock</a>
                </div>{{-- .product-cart-sell --}}

            </aside>{{-- .product-cart --}}
        </div>{{-- .row --}}
    </div>{{-- #product-container --}}
@endsection