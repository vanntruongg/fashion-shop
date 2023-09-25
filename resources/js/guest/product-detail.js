const increase = document.getElementById('btn_increase');
const decrease = document.getElementById('btn_decrease');
const quantity = document.getElementById('quantity');

let valueQuantity = 1;
quantity.value = valueQuantity;

increase.addEventListener('click', () => {
  valueQuantity++;
  quantity.value = valueQuantity;
});

decrease.addEventListener('click', () => {
  if(quantity.value > 1) {
    valueQuantity--;
    quantity.value = valueQuantity;
  }
})