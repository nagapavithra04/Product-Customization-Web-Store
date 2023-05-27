function screenshot(){
  var canvas = document.getElementById("tshirt");
  html2canvas(canvas).then(function(canvas){
      var dataURL = canvas.toDataURL();
      var binary = atob(dataURL.split(',')[1]);
      var array = new Uint8Array(binary.length);
      for (var i = 0; i < binary.length; i++) {
          array[i] = binary.charCodeAt(i);
      }
      var formData = new FormData();
      formData.append('image', new Blob([array], {type: 'image/png'}), 'UsersInformation.png');
      $.ajax({
          url: 'save-screenshot.php',
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response){
              console.log(response);
          },
          error: function(jqXHR, textStatus, errorThrown){
              console.log(errorThrown);
          }
      });
  });
}
