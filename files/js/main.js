$(document).ready(function () {

    $('.alert').addClass('show');
    $('.alert').click(function () {
      $('.alert').remove();
      $('.flash-container').remove();
    });
});