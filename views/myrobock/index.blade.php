@extends('layouts.web')

{{--PAGE TITLE--}}
@section('title')

    {{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    <div id="home-container" class="container-fluid">
        <div class="row">
            <div id="block-user" class="col-sm-6 col-md-4 col-lg-3 block-home">
                <div class="block-container">
                    <header>
                        <h3>
                            @guest
                                Welcome
                            @else
                                {{ Auth::user()->first_name }}
                            @endguest
                        </h3>
                    </header>
                    <section>
                        <div class="section-body">
                            <h4>
                                Sell your products
                            </h4>
                            <p>
                                Si tienes inventario de partes electricas
                                registrate en my Robock y comienza a
                                vender alrededor del mundo.
                            </p>
                        </div>
                    </section>
                    <footer>
                        <a href="#" class="btn btn-block btn-secondary">
                            <i class="fas fa-plus-square"></i> Create your store
                        </a>
                    </footer>
                </div>{{-- .block-container --}}
            </div>{{-- #block-user --}}

            <div id="block-last-visit" class="col-sm-6 col-md-4 col-lg-3 block-home">
                <div class="block-container">
                    <header>
                        <h3>
                            In your last visit
                        </h3>
                    </header>
                    <section>
                        <a href="{{ route('product.show', [$lastVisit->category->slug, $lastVisit->id_product, $lastVisit->slug]) }}">
                            <img src="{{ $lastVisit->images->where('cover', 1)->first()->image_path_m }}"
                                 alt="{{ $lastVisit->name }}" class="img-fluid">
                            <div class="section-body">
                                <div class="price">
                                    @if($lastVisit->wholesale_price !== null)
                                        <small class="currency">$</small>{{ $lastVisit->wholesale_price_format }} -
                                        <small class="currency">$</small>{{ $lastVisit->price_format }}
                                    @else
                                        <small class="currency">$</small>{{ $lastVisit->price_format }}
                                    @endif
                                </div>
                                <div class="description">
                                    {{ $lastVisit->name }}
                                </div>
                            </div>
                        </a>
                    </section>
                    <footer>
                        <a href="#"><i class="fas fa-plus-square"></i> See my history</a>
                    </footer>
                </div>{{-- .block-container --}}
            </div>{{-- #block-last-visit --}}

            <div id="block-deal" class="col-sm-6 col-md-4 col-lg-3 block-home">
                <div class="block-container">
                    <header>
                        <h3>
                            Today's Deal
                        </h3>
                    </header>
                    <section>
                        <a href="{{ route('product.show', [$todaysDeal->category->slug, $todaysDeal->id_product, $todaysDeal->slug]) }}">
                            <img src="{{ $todaysDeal->images->where('cover', 1)->first()->image_path_m }}"
                                 alt="{{ $todaysDeal->name }}" class="img-fluid">
                            <div class="section-body">
                                <div class="price">
                                    @if($todaysDeal->wholesale_price !== null)
                                        <small class="currency">$</small>{{ $todaysDeal->wholesale_price_format }} -
                                        <small class="currency">$</small>{{ $todaysDeal->price_format }}
                                    @else
                                        <small class="currency">$</small>{{ $todaysDeal->price_format }}
                                    @endif
                                </div>
                                <div class="description">
                                    {{ $todaysDeal->name }}
                                </div>
                            </div>
                        </a>
                    </section>
                    <footer>
                        <a href="#"><i class="fas fa-plus-square"></i> See more deals</a>
                    </footer>
                </div>{{-- .block-container --}}
            </div>{{-- #block-deal --}}

            <div id="ad-single-sm" class="col-sm-6 col-md-4 col-lg-3 block-home">
                <div class="ad-space block-container">
                    <section>
                        <a href="#">
                            <img src="{{ asset('img/demo/ad-500-750.jpg') }}" alt="" class="img-fluid">
                        </a>
                    </section>
                    <footer>
                        <small><a href=""><i class="far fa-lightbulb"></i> Advertisement</a></small>
                    </footer>
                </div>{{-- .block-container --}}
            </div>{{-- #block-ad-home-container --}}

            {{-- ////////// HOT CATEGORIES //////////--}}
            <section id="hot-categories" class="col-sm-12 col-md-8 col-lg-12 block-home">
                <div class="product-slider">
                    <header>
                        <h3>
                            <small><i class="far fa-list-alt"></i></small>
                            Hot categories
                        </h3>
                        <a href="{{ route('categories.index') }}"><i class="fas fa-plus-square"></i> All categories</a>
                    </header>
                    <div class="product-slider-content">
                        @foreach($categories as $category)
                            <article class="product-slider-item product-slider-item-sm">
                                <a href="{{ route('categories.show', [$category->id_category, $category->slug]) }}">
                                    <img src="https://via.placeholder.com/100x100.jpg" alt="{{ $category->name }}">
                                    <div class="name">
                                        {{ $category->name }}
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>{{-- .product-slider-content --}}

                    {{-- SLIDER CONTROLLERS --}}
                    <a href="#" class="product-slider-control product-slider-prev">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#" class="product-slider-control product-slider-next">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div> {{-- .project-slider --}}
            </section>{{-- #block-categories --}}
        </div>{{-- .row --}}

        {{-- ////////// LARGE SINGLE AD SECTION //////////--}}
        <div class="row">
            <section id="ad-single-lg" class="col-12 mb-3">
                <div class="ad-space block-container">
                    <section class="ad-overflow ad-flow-2000">
                        <a href="#">
                            <img src={{ asset('img/demo/ad-2000-250.jpg') }} alt="">
                        </a>
                    </section>
                    <footer>
                        <small><a href=""><i class="far fa-lightbulb"></i> Advertisement</a></small>
                    </footer>
                </div>
            </section>{{-- #single-ad-lg --}}
        </div>{{-- .row ad container--}}

        {{-- ////////// NEW ARRIVALS SECTION //////////--}}
        <div class="row">
            <section id="new-arrivals" class="col-12 block-home">
                <div class="product-slider">
                    <header>
                        <h3>
                            <small><i class="far fa-clock"></i></small>
                            New arrivals
                        </h3>
                        <a href="#"><i class="fas fa-plus-square"></i> More products</a>
                    </header>
                    <div class="product-slider-content">
                        @foreach($newArrivals as $newArrival)
                            <article class="product-slider-item product-slider-item-md">
                                <a href="{{ route('product.show', [$newArrival->category->slug, $newArrival->id_product, $newArrival->slug]) }}">
                                    <img src="{{ $newArrival->images->where('cover', 1)->first()->image_path_m }}"
                                         alt="{{ $newArrival->name }}">
                                    <div class="price">
                                        @if($newArrival->wholesale_price !== null)
                                            <small class="currency">$</small>{{ $newArrival->wholesale_price_format }} -
                                            <small class="currency">$</small>{{ $newArrival->price_format }}
                                        @else
                                            <small class="currency">$</small>{{ $newArrival->price_format }}
                                        @endif
                                    </div>
                                    <div class="description">
                                        {{ $newArrival->name }}
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>{{-- .product-slider-content --}}

                    {{-- SLIDER CONTROLLERS --}}
                    <a href="#" class="product-slider-control product-slider-prev">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#" class="product-slider-control product-slider-next">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div> {{-- .project-slider --}}
            </section> {{-- #new-arrivals --}}
        </div> {{-- .row new arrivals--}}

        {{-- ////////// DEALS SECTION ////////// --}}
        <div class="row">
            <section id="deals" class="col-12 block-home">
                <div class="product-slider">
                    <header>
                        <h3>
                            <small><i class="fab fa-hotjar"></i></small>
                            Hot deals
                        </h3>
                        <a href="#"><i class="fas fa-plus-square"></i> More deals</a>
                    </header>
                    <div class="product-slider-content">
                        @foreach($hotDeals as $hotDeal)
                            <article class="product-slider-item product-slider-item-md">
                                <a href="{{ route('product.show', [$hotDeal->category->slug, $hotDeal->id_product, $hotDeal->slug]) }}">
                                    <img src="{{ $hotDeal->images->where('cover', 1)->first()->image_path_m }}"
                                         alt="{{ $hotDeal->name }}">
                                    <div class="price">
                                        @if($hotDeal->wholesale_price !== null)
                                            <small class="currency">$</small>{{ $hotDeal->wholesale_price_format }} -
                                            <small class="currency">$</small>{{ $hotDeal->price_format }}
                                        @else
                                            <small class="currency">$</small>{{ $hotDeal->price_format }}
                                        @endif
                                    </div>
                                    <div class="description">
                                        {{ $hotDeal->name }}
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>{{-- .product-slider-content --}}

                    {{-- SLIDER CONTROLLERS --}}
                    <a href="#" class="product-slider-control product-slider-prev">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#" class="product-slider-control product-slider-next">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div> {{-- .project-slider --}}
            </section>{{-- #deals --}}
        </div> {{-- .row deals--}}

        {{-- ////////// TWIN ADS SECTION ////////// --}}
        <div class="row">
            <section id="ad-twin-left" class="col-12 col-md-6 mb-3">
                <div class="ad-space block-container">
                    <section class="ad-overflow ad-flow-1000">
                        <a href="#">
                            <img src={{ asset('img/demo/ad-1000-250-1.jpg') }}  alt="">
                        </a>
                    </section>
                    <footer>
                        <small><a href=""><i class="far fa-lightbulb"></i> Advertisement</a></small>
                    </footer>
                </div>
            </section> {{-- #ad-twin-left --}}
            <section id="ad-twin-right" class="col-12 col-md-6 mb-3">
                <div class="ad-space block-container">
                    <section class="ad-overflow ad-flow-1000">
                        <a href="#">
                            <img src={{ asset('img/demo/ad-1000-250-2.jpg') }} alt="">
                        </a>
                    </section>
                    <footer>
                        <small><a href=""><i class="far fa-lightbulb"></i> Advertisement</a></small>
                    </footer>
                </div>
            </section>{{-- #ad-twin-right --}}
        </div>{{-- .row ad container--}}

        {{-- ////////// CUSTOM ITEMS SECTION //////////--}}
        <div class="row">
            <section id="custom-items" class="col-12">
                <div class="product-slider">
                    <header>
                        <h3>
                            <small><i class="far fa-thumbs-up"></i></small>
                            Recommended for you
                        </h3>
                        <a href="#"><i class="fas fa-plus-square"></i> More recomendations</a>
                    </header>
                    <div class="product-slider-content">
                        <article class="product-slider-item product-slider-item-md">
                            <a href="">
                                <img src={{ asset('img/demo/IN254C.jpg') }} alt="">
                                <div class="price">
                                    <small class="currency">$</small>
                                    5.20 -
                                    <small class="currency">$</small>
                                    6.56
                                </div>
                                <div class="description">
                                    REG TOYOTA LIFT TRUCKS 12V 57.5mm S-NIPP HARFON
                                </div>
                            </a>
                        </article>
                        <article class="product-slider-item product-slider-item-md">
                            <a href="">
                                <img src={{ asset('img/demo/INR735C.jpg') }} alt="">
                                <div class="price">
                                    <small class="currency">$</small>
                                    7.80 -
                                    <small class="currency">$</small>
                                    8.25
                                </div>
                                <div class="description">
                                    RECTIFIER ALT DENSO 12V 120-136A ER-IF JEEP CHRYSLER HARFON
                                </div>
                            </a>
                        </article>
                        <article class="product-slider-item product-slider-item-md">
                            <a href="">
                                <img src={{ asset('img/demo/11189.jpg') }} alt="">
                                <div class="price">
                                    <small class="currency">$</small>
                                    82.82 -
                                    <small class="currency">$</small>
                                    87.18
                                </div>
                                <div class="description">
                                    ALT VALEO 12V 120A CW 6C HYU KIA SONAT MAGE FORT 2.4L 06-13
                                </div>
                            </a>
                        </article>
                        <article class="product-slider-item product-slider-item-md">
                            <a href="">
                                <img src={{ asset('img/demo/M5-329AC.jpg') }} alt="">
                                <div class="price">
                                    <small class="currency">$</small>
                                    11.56 -
                                    <small class="currency">$</small>
                                    12.56
                                </div>
                                <div class="description">
                                    REG MOTOROLA PRESTOLITE 12V 14.2VSET 8LHA SERIES HARFON
                                </div>
                            </a>
                        </article>
                    </div>{{-- .product-slider-content --}}

                    {{-- SLIDER CONTROLLERS --}}
                    <a href="#" class="product-slider-control product-slider-prev">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#" class="product-slider-control product-slider-next">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div> {{-- .project-slider --}}
            </section>{{-- #custom-items --}}
        </div> {{-- .row custom-items--}}
    </div>{{-- #home-container --}}
@endsection

{{-- USE THIS SECTION IF CONTENT IS A FORM IE: CREATE OR EDIT--}}
@section('scripts')
    <script type="text/javascript">
        jQuery.fn.extend({
            productSlider: function () {
                return this.each(function () {
                    var sliderProduct = $(this).find('.product-slider');
                    var sliderProductItem = $(this).find('.product-slider-item');
                    var sliderProductContent = $(this).find('.product-slider-content');
                    var sliderProductControl = $(this).find('.product-slider-control');
                    var sliderProductCount = sliderProductItem.length;

                    //Reposiciona los controles de los sliders dinamicamente
                    sliderProductControl.css({
                        "display": "block",
                        "top": ((sliderProduct.height() - sliderProductControl.height()) / 2)
                    })

                    //Control PREV del slider
                    $(this).find('.product-slider-prev').click(function (e) {
                        e.preventDefault();

                        var sliderPosition = parseInt(sliderProductContent.css('left'));

                        if (sliderPosition < 0) {
                            sliderProductContent.animate({"left": "+=" + (sliderProduct.width() / 2)}, {duration: 250});
                        }
                    });

                    //Control NEXT del slider
                    $(this).find('.product-slider-next').click(function (e) {
                        e.preventDefault();

                        var sliderPosition = parseInt(sliderProductContent.css('left'));
                        var sliderOffset = parseInt(sliderProduct.width() - (sliderProductCount * sliderProductItem.width()));

                        if (sliderPosition > sliderOffset) {
                            sliderProductContent.animate({"left": "-=" + (sliderProduct.width() / 2)}, {duration: 250});

                        }
                    });
                });
            }
        });
        $(document).ready(function () {
            $('#hot-categories').productSlider();
            $('#new-arrivals').productSlider();
            $('#deals').productSlider();
            $('#custom-items').productSlider();
        });
    </script>
@endsection