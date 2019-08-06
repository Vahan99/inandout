$(document).ready(function () {

  $('.nav-link').on('click',function (e) {
    e.stopPropagation();
    const nextElement = $(this).next('ul');
    $('.hide-menu').not(nextElement).slideUp(500);
    nextElement.slideToggle(500);

  });

  $('.nav-link-second').on('click',function (e) {
    e.stopPropagation();
    const nextElement = $(this).next('ul');
    $('.hide-menu-lvl-2').not(nextElement).slideUp(500);
    nextElement.slideToggle(500);

  });

  $(document).on('click',function () {
    $('.hide-menu').slideUp();
  });

  $('.days-link').on('click',function () {
    let current = $(this).data('for');
    $('.day-content').fadeOut(0);
    $('.day-content.' + current).fadeIn(500);
    let currentActive = $(this).closest('li');
    $('.days-short-description li').not(currentActive).removeClass('active');
    currentActive.addClass('active');
  });

  $('.select2-hidden-accessible').select2();

  $('.mobile-menu-btn').on('click', function (e) {
    e.stopPropagation();
    $('.line-2').toggleClass('opacity-0');
    $('.line-1').toggleClass('rotate-1');
    $('.line-3').toggleClass('rotate-3');

    $('.mobile-menu').toggleClass('menu--position');
  });

  $('.hide-menu').on('click',function (e) {
    e.stopPropagation();
  });

  $('.menu-header').on('click',function () {
    let currentElem = $(this).next('ul');
    $('.hided-content').not(currentElem).slideUp(500);
    currentElem.slideToggle(500);
  });



});