const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const overlayDelete = $('.overlay-delete');

const modalDeleteOrder = $('.modal-delete-order');
const cancelDeleteOrder = $('.cancel-delete-order');

const listBtnDeleteOrder = $$('.delete-order');

const idOrder = document.getElementById('idOrder');

if(listBtnDeleteOrder) {
    listBtnDeleteOrder.forEach(btnDeleteOrder => {
        btnDeleteOrder.addEventListener('click', function() {
      overlayDelete.classList.remove('hidden');
      modalDeleteOrder.classList.remove('hidden');
      const orderId = btnDeleteOrder.dataset.id;

      if(idOrder) {
        idOrder.value = orderId;
      }
      console.log(idOrder.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteOrder.classList.add('hidden');
  })
}

if(cancelDeleteOrder) {
    cancelDeleteOrder.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteOrder.classList.add('hidden');
  })
}