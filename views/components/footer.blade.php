<footer id="footer">
    <section class="brand-gradient-static">
        <div id="back-top"> 
            <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-up"></i>{{ trans('myrobock.back') }}</a>
        </div>
    </section>
    <section id="footer-content" class="container">
        <div id="sitemap" class="row">
            <nav class="nav nav-pills">
                <a class="flex-sm-fill text-sm-center nav-link" href="#">{{ trans('myrobock.help') }}</a>
            </nav>
        </div>
        <div id="legal-notice" class="row">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ trans('myrobock.term') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ trans('myrobock.privacy') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ trans('myrobock.work') }}</a>
                </li>
            </ul>
            <p class="copyright">
                {{ trans('myrobock.copyright') }} &copy; 2018-{{date('Y')}} {{ trans('myrobock.myrobock') }}. 
            </p>
        </div>
    </section>
</footer>
<script type="text/javascript" src="{{ asset('js/front/app.js') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>