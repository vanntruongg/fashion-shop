// import constants from "../constants";
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const overlayDelete = $('.overlay-delete');

const modalDeleteUser = $('.modal-delete-user');
const cancelDeleteUser = $('.cancel-delete-user');

const listBtnDeleteUser = $$('.delete-user');

const btnDeleteUser = document.getElementById('btn-delete-user');

const idUser = document.getElementById('idUser');

if(listBtnDeleteUser) {
    listBtnDeleteUser.forEach(btnDeleteUser => {
        btnDeleteUser.addEventListener('click', function() {
      overlayDelete.classList.remove('hidden');
      modalDeleteUser.classList.remove('hidden');
      const UserId = btnDeleteUser.dataset.id;

      if(idUser) {
        idUser.value = UserId;
      }
      console.log(idUser.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteUser.classList.add('hidden');
  })
}

if(cancelDeleteUser) {
    cancelDeleteUser.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteUser.classList.add('hidden');
  })
}


















