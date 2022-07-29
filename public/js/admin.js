$(function(){
    $('.category-tabs__item').on('click', function (e){
        e.preventDefault();
        $('.category-tabs__item').removeClass('category-tabs__item-active');
        $('.category-content__item').removeClass('category-content__item-active');

        $(this).addClass('category-tabs__item-active');
        $($(this).attr('href')).addClass('category-content__item-active');
    })
});
