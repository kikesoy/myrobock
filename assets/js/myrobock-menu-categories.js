$(document).ready(function () {
    // MENU CATEGORIAS -----------------------
    var catMenu = $('#cat-menu');

    // Abrir menu categorias
    function catMenuOpen() {
        $(catMenu).fadeIn('fast', function () {
            $(this).css('display', 'flex');
            $('.cat-menu-container').animate({left: "0"}, 250);
            $('body').addClass('no-scroll');
        });
    }

    // Cerrar menu categorias
    function catMenuClose() {
        $('.cat-menu-container').animate({left: '-400px'}, 250, function () {
            $(catMenu).fadeOut('fast', function () {
                $('#menu-cat-main').removeClass('hidden-left').addClass('visible');
                $('.cat-child').removeClass('visible').addClass('hidden-right');
            });
            $('.cat-menu-body ul').scrollTop(0);
            $('body').removeClass('no-scroll');
        });
    }

    // Anexa a la lista de subcategorias el boton para regresar a la categoria padre
    $('.cat-child').each(function () {
        $(this).prepend('<li><a href="#" class="cat-menu-title cat-menu-back"><i class="fas fa-chevron-left"></i> Back</a></li>');
    });

    // Abrir menu de categorias
    $('#nav-categories').click(function (e) {
        e.preventDefault();
        catMenuOpen();
    });

    //Ocultar menu de categorias
    $('.cat-menu-close a').click(function (e) {
        e.preventDefault();
        catMenuClose();
    });

    $('.cat-menu-overlay').click(function (e) {
        e.preventDefault();
        catMenuClose();
    });

    // Muestra la categoria hijo y esconde la categoria padre
    $('.cat-menu-next').on('click', function (e) {
        e.preventDefault();
        var childCatId = '#menu-' + $(this).closest('li').prop('id');
        $('#menu-cat-main').removeClass('visible').addClass('hidden-left');
        $(childCatId).removeClass('hidden-right').addClass('visible');
    });

    // Esconde la categoria hijo y regresa a la categoria padre
    $('.cat-menu-back').on('click', function (e) {
        e.preventDefault();
        var childCatId = '#' + $(this).closest('ul').prop('id');
        $('#menu-cat-main').removeClass('hidden-left').addClass('visible');
        $(childCatId).removeClass('visible').addClass('hidden-right');
    });
});