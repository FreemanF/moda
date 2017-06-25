$(".b-choose-category__list .b-choose-category__item").click(function() {
    $('.b-choose-category__list .b-choose-category__item').removeClass('b-choose-category__item_state_active');
    $(this).toggleClass('b-choose-category__item_state_active');
    $('#category-select').show();
});
$('a#category-select-close').click(function() {
    $('#category-select').hide();
    var cat = $(this).text();
    $('.b-choose-category__chosen').removeClass('b-hidden');
    $('.b-choose-category__chosen span').text(cat);
    $('#sizex').removeClass('b-hidden');
});
$('.b-button.b-image-upload.b-add-product__button').click(function() {
    $('.b-add-product__button').hide();
    $('.b-info-slider.b-add-product__slider').hide();
    $('.b-image-upload').removeClass('b-hidden');
});
$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
})
$('.b-choose-color__item').click(function() {
    var nth = $(this).index();
    var i = 0;
    while (i <= 17) {

        if (nth == i) {
            $(this).toggleClass('c' + nth);
        }
        i++;
        // $('.b-choose-color__item:not(:nth-child('+nth+'))').removeClass('c'+nth);
    }
});
$('.salex label.b-info-columns__item').click(function() {
    $('.salex label.b-info-columns__item').removeClass('b-info-columns__item_state_active');
    $(this).addClass('b-info-columns__item_state_active');
});
$('.seox label.b-info-columns__item').click(function() {
    $('.seox label.b-info-columns__item').removeClass('b-info-columns__item_state_active');
    $(this).addClass('b-info-columns__item_state_active');
});
$('.product-condition .Select-control').click(function() {
    $(this).addClass('is-open').addClass('is-focused');
    $('.product-condition .Select-menu-outer').css('display', 'block');
});
$('.Select-option').on({
    mouseenter: function() {
        $(this).addClass('is-focused');
    },
    mouseleave: function() {
        $(this).removeClass('is-focused');
    }
});
$('.product-condition .Select-option').click(function() {
    $('.product-condition .Select-menu-outer').css('display', 'none');
    var txt = $(this).text();
    $('.product-condition .Select-placeholder').text(txt);
    $('.product-condition').removeClass('is-open');
    $('.product-condition').removeClass('is-focused');
    $('.product-condition').addClass('has-value');
    $('.product-condition .Select-control .Select-value-label').attr('aria-selected', 'true');
});
$('.product-brand .Select-control').click(function() {
    $(this).addClass('is-open').addClass('is-focused');
    $('.product-brand .Select-menu-outer').css('display', 'block');
});
