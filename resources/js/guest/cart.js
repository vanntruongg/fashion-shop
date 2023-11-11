import axios from "axios";
const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

const listBtnIncrease = document.querySelectorAll('.increase');
const listBtnDecrease = document.querySelectorAll('.decrease');
const listQuantity = document.querySelectorAll('.quantity');
const listPrice = document.querySelectorAll(".price")
const totalPrice = document.querySelector(".totalPrice")

const formatVND = (amount) => {
  var formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits: 0,
  });

  return formatter.format(amount)
}
const calculatorTotalPrice = (listProducts) => {
  let total = 0

  listProducts.forEach((product, index) => {
    total += product.CTGH_SoLuong * product.SP_Gia
  })

  totalPrice.innerText = formatVND(total);
}
const calculatorPrice = (listProducts) => {
  listProducts.forEach((product, index) => {
    const price = product.CTGH_SoLuong * product.SP_Gia
    listPrice[index].innerText = formatVND(price)
    calculatorTotalPrice(listProducts)
  })
}
calculatorPrice(products)

listBtnIncrease.forEach((btnIncrease, index) => {
  const productId = btnIncrease.dataset.productId;
  btnIncrease.addEventListener('click', () => {
    let currentQuantity = parseInt(listQuantity[index].innerText);
    currentQuantity++;
    axios.post('/update-quantity-cart', {
      productId, 
      quantity: currentQuantity,
    })
    .then(res => {
      
      listQuantity[index].innerText = currentQuantity;
      calculatorPrice(res.data.products)
      })
      .catch(err => {
        console.log(err);
      })
  })
})

listBtnDecrease.forEach((btnDecrease, index) => {
  const productId = btnDecrease.dataset.productId;
  btnDecrease.addEventListener('click', () => {
    let currentQuantity = parseInt(listQuantity[index].innerText);
    if(currentQuantity > 1) {
        currentQuantity--;
        
        axios.post('/update-quantity-cart', {
          productId, 
          quantity: currentQuantity,
        })
        .then(res => {
            listQuantity[index].innerText = currentQuantity;
            calculatorPrice(res.data.products)
          })
          .catch(err => {
            console.log(err);
          })
      }
  })
})


const selectItems = document.querySelectorAll('.checkboxItem');
const btnPayment = document.getElementById('payment');

const getSelectedItems = () => {
  let items = [];
  selectItems.forEach(item => {
    if(item.checked) {
      items.push(item.dataset.productId);
    }
  })
  return items;
}

btnPayment.addEventListener('click', () => {
  const selectedItems = getSelectedItems();
  // console.log(selectedItems);
  if(selectedItems.length > 0) {
    axios.post('/checkout',  {
      productIds: selectedItems
    })
    .then(res => {
      console.log(res);
      window.location.href = '/get-checkout?products=' + encodeURIComponent(JSON.stringify(res.data));
    });
  }
})
