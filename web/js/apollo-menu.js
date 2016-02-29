$(function () {
  $("button#btn-logout").on('click', function () {
    document.location.href = APPL_BASE + 'login/logout';
  });
});