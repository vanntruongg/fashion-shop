import axios from "axios";
const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

const listBtnIncrease = document.querySelectorAll('.increase');
const listBtnDecrease = document.querySelectorAll('.decrease');
const listQuantity = document.querySelectorAll('.quantity');

// listQuantity.forEach(quantity => {
//   quantity.innerText = 1;
// })

listBtnIncrease.forEach((btnIncrease, index) => {
  const productId = 1;
  btnIncrease.addEventListener('click', () => {
    let currentQuantity = parseInt(listQuantity[index].innerText);
    // currentQuantity++;
    // listQuantity[index].innerText = currentQuantity;
    axios.post('/update-quantity-cart', {
      productId, 
      quantity: currentQuantity + 1,
    })
      .then(res => {
        console.log(res.data.message);
      })
      .catch(err => {
        console.log(err);
      })
  })
})

listBtnDecrease.forEach((btnDecrease, index) => {
  const productId = 1;
  btnDecrease.addEventListener('click', () => {
    let currentQuantity = parseInt(listQuantity[index].innerText);
      if(currentQuantity > 1) {
        // currentQuantity--;
        // listQuantity[index].innerText = currentQuantity;

        axios.post('/update-quantity-cart', {
          productId, 
          quantity: currentQuantity - 1,
        })
          .then(res => {
            console.log(res.data.message);
          })
          .catch(err => {
            console.log(err);
          })
      }
  })
})