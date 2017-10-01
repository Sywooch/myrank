$(document).ready(function () {

    $(".b-tabs__nav").tab();

    $(".b-tabs__link").on("click", function () {
        $(".b-tabs__link").removeClass("b-tabs__link_active");
        $(this).addClass("b-tabs__link_active");
    });

    $('.b-user__portfolio__carousel').find('.owl-carousel').owlCarousel({
        loop: false,
        dots: false,
        nav: false,
        margin: 8,
        items: 6,
        responsive: {
            320: {
                items: 2
            },
            480: {
                items: 3
            },
            767: {
                items: 5
            },
            991: {
                items: 4
            }
        },
        onInitialized: function (e) {
            var carousel = $(e.target),
                    nav = carousel.parent().find('.b-user__portfolio__carousel__nav'),
                    navPrev = nav.children('.b-user__portfolio__carousel__prev'),
                    navNext = nav.children('.b-user__portfolio__carousel__next');

            navPrev.on('click', function () {
                carousel.trigger('prev.owl.carousel');
            });

            navNext.on('click', function () {
                carousel.trigger('next.owl.carousel');
            });
        }
    });

    // slider
    $('.b-last-users__carousel').owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 5,
        autoplay: false,
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            },
            420: {
                items: 2
            },
            600: {
                items: 3
            },
            767: {
                items: 4
            },
            991: {
                items: 5
            }
        }
    });

    // mobile menu
    $('[data-mobileMenu="icon"]').each(function (i) {
        var that = $(this);
        var parent = that.parents('[data-mobileMenu="container"]');

        that.on('click', function () {
            function ternMenu() {
                that.toggleClass('active');
                parent.toggleClass('open');
            }

            ternMenu();

            var yourClick = true;
            $(document).on('click.menuBind' + (i + 1) + ' touchstart.menuBind' + (i + 1), function (e) {
                if (!yourClick && $(e.target).closest(parent).length == 0) {
                    ternMenu();
                    $(document).unbind('click.menuBind' + (i + 1) + ' touchstart.menuBind' + (i + 1));
                }
                yourClick = false;
            });
        });
    });

    // ui-slider
    $('.marks-slider').slider({
        range: "min",
        min: 0,
        max: 10,
        step: 0.1,
        value: 7.4,
        slide: function (event, ui) {
            var container = $(this).parents('.b-marks__item__content__slider');
            var input = $('.marks-slider-amount', container);

            $(input).val(ui.value);

            changeLike(this, ui.value);
        },
        create: function (event, ui) {
            var that = this;
            var container = $(this).parents('.b-marks__item__content__slider');
            var input = $('.marks-slider-amount', container);

            var checkVal = function () {
                $(that).slider("value", input.val());
            }

            checkVal();

            input.on('input', function () {
                checkVal();
            });

            changeLike(this, input.val());
        }
    });

    function changeLike(that, val) {
        cont = $(that).parents('.b-marks__item__content__row');
        block = $('.b-marks__item__content__like', cont);
        
        if(val > 0.0) {
            block.show();
        } else {
            block.hide();
        }
        
        valClass(block, val);
    }
    
    function valClass (block, val) {
        likeDown = block.hasClass('b-marks__item__content__like_down');
        if (val < 5.0) {
            if (!likeDown) {
                block.removeClass('b-marks__item__content__like_up').addClass('b-marks__item__content__like_down');
            }
        } else {
            if (likeDown) {
                block.removeClass('b-marks__item__content__like_down').addClass('b-marks__item__content__like_up');
            }
        }
    }

    $('.header-marks-slider').slider({
        range: true,
        min: 0,
        max: 1000,
        step: 1,
        value: 7.4,
        slide: function (event, ui) {
            var container = $(this).parents('.b-header__search__advanced__mark');
            var inputMin = $('.header-marks-slider-amount-min', container);
            var inputMax = $('.header-marks-slider-amount-max', container);

            $(inputMin).val(ui.values[0]);
            $(inputMax).val(ui.values[1]);
        },
        create: function (event, ui) {
            var that = this;
            var container = $(this).parents('.b-header__search__advanced__mark');
            var inputMin = $('.header-marks-slider-amount-min', container);
            var inputMax = $('.header-marks-slider-amount-max', container);

            var checkVal = function () {
                $(that).slider("values", 0, inputMin.val());
                $(that).slider("values", 1, inputMax.val());
            }

            checkVal();

            inputMin.on('input', function () {
                checkVal();
            });
            inputMax.on('input', function () {
                checkVal();
            });
        }
    });

    $('.b-user__portfolio__more').on('click touchstart', function () {
        if ($(this).hasClass('open')) {
            $('.b-user__portfolio__content').slideUp();
            $(this).removeClass('open').find('span').text('Развернуть');
        } else {
            $('.b-user__portfolio__content').slideDown();
            $(this).addClass('open').find('span').text('Свернуть');

        }
    });


    $('.b-comments__button-more').on('click touchstart', function () {
        $(this).toggleClass('loading');
    });



    $('.b-marks__item__header').on('click', function () {
        var that = $(this);
        var parent = that.parents('.b-marks__item');

        parent.toggleClass('open');
    });

    $('.b-category__content .viewAll a').on('click', function(e){
        e.preventDefault();
        $('.b-category__content').addClass('open');
    });

    $('.input-phone').inputmask('+38 ( 999 ) 999 - 99 - 99');
    $('.input-phone-company').inputmask('0 44 999 99 99');

    $(window).resize(function () {
        if ($(window).width() < 768) {
            $(".b-marks").after($(".b-diagramm"));
        } else {
            $('.b-diagramm').prependTo('.b-sidebar');
        }
    });

    $('.b-user__info .b-user__data__name__edit').on('click', function () {
        tinymce.init({
            selector: '.b-user__info__text'
        });
    });


    $('.modal').on('shown.bs.modal', function () {
        $('.specialization-select select').select2({
            maximumSelectionLength: 10,
        });
        $('.country-select select').select2({
            placeholder: "Страна"
        });
        $('.city-select select').select2({
            placeholder: "Город"
        });
    })

    $('.input-phone').inputmask('+38 ( 999 ) 999 - 99 - 99');
    $('.input-phone-company').inputmask('0 44 999 99 99');


    $('body').on('click', '.modalView', function () {
        url = $(this).attr('data-url');
        csrf = $('[name="csrf-token"]').attr('content');
        showModal(url, 0, 1);
        return false;
    });

    $('#alert-warning').on('click', function () {
        $('.alert').removeClass('in').css('margin-bottom', '0');
        $('.alert-warning').addClass('in').css('margin-bottom', '-' + $('.alert-warning').outerHeight() + 'px');
    });
    $('#alert-success').on('click', function () {
        $('.alert').removeClass('in').css('margin-bottom', '0');
        $('.alert-success').addClass('in').css('margin-bottom', '-' + $('.alert-warning').outerHeight() + 'px');
    });
    $('#alert-info').on('click', function () {
        $('.alert').removeClass('in').css('margin-bottom', '0');
        $('.alert-info').addClass('in').css('margin-bottom', '-' + $('.alert-warning').outerHeight() + 'px');
    });

    if($(window).width() < 768){
        $('.b-header__user__info__text > a').on('click', function(e){
            var that = $(this);
            var parent = that.parents('.b-header__user__info');

            if(parent.is('.open')){
                parent.removeClass('open');
                return;
            }
            e.preventDefault();

            parent.addClass('open');

            var yourClick = true;
            $(document).on('click.userMenuBind touchstart.userMenuBind', function (e) {
                if (!yourClick && $(e.target).closest(parent).length == 0) {
                    parent.removeClass('open');
                    $(document).unbind('click.userMenuBind touchstart.userMenuBind');
                }
                yourClick = false;
            });
        });
    }
});

/**
 * 
 * @param string url
 * @param array param
 * @param string csrf
 * @param int n 1/0 новое_окно/старое
 * @returns Show modal
 */
function showModal(url, param, n) {
    $.ajax({
        url: url,
        dataType: 'json',
        data: {param: param, '_csrf-frontend': $('[name="csrf-token"]').attr('content')},
        method: 'POST',
        success: function (out) {
            if (out.code == 1) {
                if (n == 1) {
                    $("#modalView").modal("toggle");
                }
                $("#modalView .modal-content").html(out.data);
            }
            //console.log(out);
        }
    });
}

function sendPost(url, param) {
    var csrf = $('[name="csrf-token"]').attr('content');
    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data: {param: param, '_csrf-frontend': csrf},
        success: function (data) {
            return data;
        }
    });
    //return out;
}

function alertGreen() {
    obj = $('.alert-success');
    $('.alert').removeClass('in').css('margin-bottom', '0');
    obj.addClass('in').css('margin-bottom', '-' + $('.alert-warning').outerHeight() + 'px');
    hideAlert(obj);
}

function alertRed(text) {
    $('.alert').removeClass('in').css('margin-bottom', '0');
    obj = $('.alert-warning');
    obj.addClass('in').css('margin-bottom', '-' + $('.alert-warning').outerHeight() + 'px');
    hideAlert(obj);
    $('.alert-warning .alertText').html(text);
}

function alertInfo(text) {
    $('.alert').removeClass('in').css('margin-bottom', '0');
    obj = $('.alert-info');
    obj.addClass('in').css('margin-bottom', '-' + $('.alert-warning').outerHeight() + 'px');
    hideAlert(obj);
    $('.alert-info .alertText').html(text);
}

function hideAlert (obj) {
    setTimeout(function() {
        obj.removeClass('in').css('margin-bottom', 0);
    }, 5000);
}

