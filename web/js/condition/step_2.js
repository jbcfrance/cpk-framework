$(function () {
  'use strict';
  // Change this to the location of your server-side upload handler:
  var url = APPL_BASE + 'condition/upload_contrat/';
  $('#fileupload_contrat').fileupload({
    url: url,
    dataType: 'json',
    done: function (e, data) {
      $.each(data.result.files, function (index, file) {
        $("input[name=contrat_file]").val(file.name);
        //$('<p/>').text(file.name).appendTo('#files');
      });
    },
    progressall: function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $('#progress .progress-bar').css(
              'width',
              progress + '%'
              );
    }
  }).prop('disabled', !$.support.fileInput)
          .parent().addClass($.support.fileInput ? undefined : 'disabled');
});