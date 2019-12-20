EqualHeight = function (selector) {

    var max = 0, all = mw.$(selector), l = all.length, i = 0, j = 0;

    for (; i < l; i++) {
        var max = all[i].offsetHeight > max ? all[i].offsetHeight : max;
    }

    for (; j < l; j++) {
        all[j].style.minHeight = max + 'px';
    }

}


$(document).ready(function () {

    $(window).bind('mw.cart.add', function (event, data) {

        if (document.getElementById('AddToCartModal') === null) {

            AddToCartModal = mw.modal({

                content: AddToCartModalContent(data.product.title),

                template: 'mw_modal_basic',

                name: "AddToCartModal",

                width: 400,

                height: 200

            });

        }

        else {

            AddToCartModal.container.innerHTML = AddToCartModalContent(data.product.title);

        }

    });

    $(window).bind('load resize', function () {

        document.getElementById('content-master').style.minHeight = ($(window).height() - $('#footer').outerHeight()) + 'px';

    });

    document.getElementById('content-master').style.minHeight = ($(window).height() - $('#footer').outerHeight()) + 'px';


    $(window).bind('load', function () {

        var slider = $('#homeslider .magic-slider')[0];

        if (typeof slider !== 'undefined') {

            $(window).bind('scroll', function () {

                if ($(window).scrollTop() > 0) {

                    slider.magicSlider.stopAutorotate()

                }

                else {

                    slider.magicSlider.autoRotate();

                }

            });

        }

        mw.onLive(function () {

            $(document.body).click(function (e) {

                if (mw.tools.hasClass(e.target, "mw-icon-changeble")) {

                    mw.iconSelector._activeElement = e.target;

                    mw.iconSelector.popup();

                }

                else if (mw.tools.hasParentsWithClass(e.target, "mw-icon-changeble")) {

                    mw.iconSelector._activeElement = e.target;

                    mw.iconSelector.popup();

                }

                else {

                    mw.iconSelector.hide();

                }


            });

        });

    });


    $(".menu-button").bind('click', function () {

        $(this).toggleClass('active');

    });


    $(".header-shopcarts-holder").hover(function (e) {

        $(this).addClass('active');

        $(this).addClass('hovered');

    }, function () {

        var el = $(this);

        el.removeClass('hovered');

        setTimeout(function () {

            if (!el.hasClass('hovered')) {

                el.removeClass('active');

            }

        }, 500);

    });

    $(document.body).bind('mousedown', function (e) {

        if (!mw.tools.hasParentsWithClass(e.target, 'header-menu')) {

            $('.menu-button.active').removeClass('active');

        }

    })


});