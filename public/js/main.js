$(function(){
    $('.banner-slider').slick({
        dots: true,
        prevArrow: '<button class="banner-slider__btn banner-slider__btn-prev"><img src="/assets/img/left-arrow.svg"></button>',
        nextArrow: '<button class="banner-slider__btn banner-slider__btn-next"><img src="/assets/img/right-arrow.svg"></button>'
    });

    $('.popular-products__slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button class="popular-slider__btn popular-slider__btn-prev"><img src="/assets/img/left-arrow.svg"></button>',
        nextArrow: '<button class="popular-slider__btn popular-slider__btn-next"><img src="/assets/img/right-arrow.svg"></button>'
    });

    $('.product-item__favorite').on('click', function(){
        $(this).toggleClass('product-item__favorite--active')
    });

    $('.rate-yo').rateYo({
        ratedFill: "#1C62CD",
        normalFill: "#C4C4C4",
        spacing: "5px"
    })
});
