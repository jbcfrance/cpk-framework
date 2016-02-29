$(function () {
  $.fn.editable.defaults.mode = 'inline';
  $('.entity_label').editable();

  $("#submit").on("click", function (event) {
    console.log($(this).closest('form'));
    $(this).closest('form').submit();
  });

  $('button[name=delete]').on('click', function (event) {
    var entity = $(this).data('entity');
    var id = $(this).data('pk');
    var element = $(this);

    $.ajax({
      method: "POST",
      url: APPL_BASE + "admin/do_delete",
      data: {entity: entity, id: id}
    })
            .success(function (msg) {
              element.closest('tr').detach();
            });
  });
});