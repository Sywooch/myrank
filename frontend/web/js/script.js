$(document).ready(function () {

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
	}
    });



    $('.header-marks-slider').slider({
	range: true,
	min: 0,
	max: 10,
	step: 0.1,
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



    $('.b-marks__item__header').on('click touchstart', function () {
	var that = $(this);
	var parent = that.parents('.b-marks__item');

	parent
		.toggleClass('open')
		.find('.b-marks__item__content').stop().slideToggle();
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
	    placeholder: "Специализация"
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
	showModal(url, 0, csrf, 1);
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


});

/**
 * 
 * @param string url
 * @param array param
 * @param string csrf
 * @param int n 1/0 новое_окно/старое
 * @returns Show modal
 */
function showModal(url, param, csrf, n) {
    $.ajax({
	url: url,
	dataType: 'json',
	data: {param: param, '_csrf-frontend': csrf},
	method: 'POST',
	success: function (out) {
	    if (out.code == 1) {
		if (n == 1) {
		    $("#modalView").modal("toggle");
		}
		$("#modalView .modal-content").html(out.data);
	    }
	    console.log(out);
	}
    });
}

