const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);



const overlayDelete = $('.overlay-delete');

const modalDeleteProduct = $('.modal-delete-product');
const cancelDeleteProduct = $('.cancel-delete-product');

const listBtnDeleteProduct = $$('.delete-product');

const idProduct = document.getElementById('idProduct');

if(listBtnDeleteProduct) {
  listBtnDeleteProduct.forEach(btnDeleteProduct => {
    btnDeleteProduct.addEventListener('click', function() {
      overlayDelete.classList.remove('hidden');
      modalDeleteProduct.classList.remove('hidden');
      const productId = btnDeleteProduct.dataset.id;

      if(idProduct) {
        idProduct.value = productId;
      }
      console.log(idProduct.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteProduct.classList.add('hidden');
  })
}

if(cancelDeleteProduct) {
  cancelDeleteProduct.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteProduct.classList.add('hidden');
  })
}




// category
const modalDeleteCategory= $('.modal-delete-category');
const cancelDeleteCategory = $('.cancel-delete-category');
const listBtnDeleteCategory = $$('.delete-category');
const idCategory = document.getElementById('idCategory');

if (listBtnDeleteCategory) {
  listBtnDeleteCategory.forEach(btnDeleteCategory => {
    btnDeleteCategory.addEventListener('click', function () {
      const categoryId = btnDeleteCategory.dataset.id;

      if (idCategory) {
        idCategory.value = categoryId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteCategory.classList.remove('hidden');
      
      console.log(idCategory.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteCategory.classList.add('hidden');
  })
}

if(cancelDeleteCategory) {
  cancelDeleteCategory.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteCategory.classList.add('hidden');
  })
}
// portfolio
const modalDeletePortfolio= $('.modal-delete-portfolio');
const cancelDeletePortfolio = $('.cancel-delete-portfolio');
const listBtnDeletePortfolio = $$('.delete-portfolio');
const idPortfolio = document.getElementById('idPortfolio');

if (listBtnDeletePortfolio) {
  listBtnDeletePortfolio.forEach(btnDeletePortfolio => {
    btnDeletePortfolio.addEventListener('click', function () {
      const portfolioId = btnDeletePortfolio.dataset.id;

      if (idPortfolio) {
        idPortfolio.value = portfolioId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeletePortfolio.classList.remove('hidden');
      
      console.log(idPortfolio.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeletePortfolio.classList.add('hidden');
  })
}

if(cancelDeletePortfolio) {
  cancelDeletePortfolio.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeletePortfolio.classList.add('hidden');
  })
}

//importwarehouse
const modalDeleteImportwarehouse= $('.modal-delete-importwarehouse');
const cancelDeleteImportwarehouse = $('.cancel-delete-importwarehouse');
const listBtnDeleteImportwarehouse = $$('.delete-importwarehouse');
const idImportwarehouse = document.getElementById('idImportwarehouse');

if (listBtnDeleteImportwarehouse) {
  listBtnDeleteImportwarehouse.forEach(btnDeletePortfolio => {
    btnDeletePortfolio.addEventListener('click', function () {
      const importwarehouseId = btnDeletePortfolio.dataset.id;

      if (idImportwarehouse) {
        idImportwarehouse.value = importwarehouseId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteImportwarehouse.classList.remove('hidden');
      
      console.log(idImportwarehouse.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteImportwarehouse.classList.add('hidden');
  })
}

if(cancelDeleteImportwarehouse) {
  cancelDeleteImportwarehouse.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteImportwarehouse.classList.add('hidden');
  })
}