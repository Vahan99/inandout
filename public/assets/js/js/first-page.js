$(document).ready(function () {

  $('.nav-link').on('click',function (e) {
    e.stopPropagation();
    const nextElement = $(this).next('ul');
    $('.hide-menu').not(nextElement).slideUp(500);
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
});