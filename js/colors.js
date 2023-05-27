let listElements = document.querySelectorAll("li");
listElements.forEach((element) => {
  element.addEventListener("click", function () {
    let clr = this.getAttribute("data-color");
    document.documentElement.style.setProperty("--color", clr);
    listElements.forEach((element) => {
      element.style.border = "none";
    });
    this.style.border = "3px solid black";
  });
});
let canvas = new fabric.Canvas('tshirt-canvas');

function updateTshirtImage(imageURL){
    fabric.Image.fromURL(imageURL, function(img) {                   
        img.scaleToHeight(260);
        img.scaleToWidth(200); 
        canvas.centerObject(img);
        canvas.add(img);
        canvas.renderAll();
    });
}

// Update the TShirt color according to the selected color by the user
document.getElementById("tshirt-design").addEventListener("change", function(){

    // Call the updateTshirtImage method providing as first argument the URL
    // of the image provided by the select
    updateTshirtImage(this.value);
}, false);

// When the user clicks on upload a custom picture
document.getElementById('tshirt-custompicture').addEventListener("change", function(e){
    var reader = new FileReader();
    
    reader.onload = function (event){
        var imgObj = new Image();
        imgObj.src = event.target.result;

        // When the picture loads, create the image in Fabric.js
        imgObj.onload = function () {
            var img = new fabric.Image(imgObj);

            img.scaleToHeight(260);
            img.scaleToWidth(200); 
            canvas.centerObject(img);
            canvas.add(img);
            canvas.renderAll();
        };
    };

    // If the user selected a picture, load it
    if(e.target.files[0]){
        reader.readAsDataURL(e.target.files[0]);
    }
}, false);

// When the user selects a picture that has been added and press the DEL key
// The object will be removed !
document.addEventListener("keydown", function(e) {
    var keyCode = e.keyCode;

    if(keyCode == 46){
        console.log("Removing selected element on Fabric.js on DELETE key !");
        canvas.remove(canvas.getActiveObject());
    }
}, false);

// Define as node the T-Shirt Div
var node = document.getElementById('tshirt-div');

domtoimage.toPng(node).then(function (dataUrl) {
// Print the data URL of the picture in the Console
console.log(dataUrl);

// You can for example to test, add the image at the end of the document
var img = new Image();
img.src = dataUrl;
document.body.appendChild(img);
}).catch(function (error) {
console.error('oops, something went wrong!', error);
});

