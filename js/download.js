jQuery(document).ready(function(){
    jQuery("#dwld").click(function(){
        screenshot();
    });
});

function screenshot(){
    html2canvas(document.getElementById("tshirt")).then(function(canvas){
       downloadImage(canvas.toDataURL(),"UsersInformation.png");
    });
}

function downloadImage(uri, filename){
  var link = document.createElement('a');
  if(typeof link.download !== 'string'){
     window.open(uri);
  }
  else{
      link.href = uri;
      link.download = filename;
      accountForFirefox(clickLink, link);
  }
}

function clickLink(link){
    link.click();
}

function accountForFirefox(click){
    var link = arguments[1];
    document.body.appendChild(link);
    click(link);
    document.body.removeChild(link);
}
