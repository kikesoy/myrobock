{{-- <section id="anouncements" class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
    Este es un mensaje de alerta para todos los usuarios
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</section> --}}
<section id="banner">
    <a href="#">
        <img src="{{ asset('img/front/header-banner/banner-top-0001.jpg') }}" alt="">
    </a>
</section>
<header id="header" class="brand-gradient-static">
    {{-- NAVEGACION --}}
    @include('components.nav')
    <div class="d-none d-md-flex px-3 pb-3">
        {{-- FORM PART FINDER --}}
        <div id="partfinder" class="w-50 mr-auto">
            <form action="" class="form-inline">
                <div class="input-group w-100">
                    <select name="" id="pf-brand" class="form-control form-control-sm mr-2">
                        <option value="">{{ trans('myrobock.brand') }}</option>
                    </select>
                    <select name="" id="pf-make" class="form-control form-control-sm mr-2">
                        <option value="">{{ trans('myrobock.make') }}</option>
                    </select>
                    <select name="" id="pf-year" class="form-control form-control-sm mr-2">
                        <option value="">{{ trans('myrobock.year') }}</option>
                    </select>
                    <select name="" id="pf-type" class="form-control form-control-sm">
                        <option value="">{{ trans('myrobock.part') }}</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        {{-- SEARCH RESPONSIVE LARGE --}}
        <div id="search">
            @include('components.nav-search')
        </div>
    </div>
</header>