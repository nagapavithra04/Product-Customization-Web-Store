function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
   reader.onload = function (e) {
    var id = 'file_' + Date.now() + '_' + input.files[0].name;
    $('#blah')
        .attr('src', e.target.result)
        .attr('data-file-id', id);
  };
  
  var fileId = $('#blah').data('file-id');


  
  






