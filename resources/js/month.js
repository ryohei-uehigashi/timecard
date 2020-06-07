$('#modalForm').on('show.bs.modal', function (event) {
  //data-visitdayの値取得
  var visitdayVal = button.data('visitday');
  modal.find('.modal-body input#oldday').val(visitdayVal);
});