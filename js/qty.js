const quantityInput = document.getElementById("quantity");
const minusButton = document.querySelector(".quantity-minus");
const plusButton = document.querySelector(".quantity-plus");

minusButton.addEventListener("click", function() {
  if (quantityInput.value > 1) {
    quantityInput.value--;
  }
});

plusButton.addEventListener("click", function() {
  quantityInput.value++;
});


