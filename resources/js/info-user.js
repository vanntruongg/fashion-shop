const inputFileImg = document.getElementById('input-file-img');
const imgPreview= document.getElementById('img-preview');


if(inputFileImg) {
  inputFileImg.addEventListener('change', function(event) {
    const image = event.target.files[0];
  
    const url = URL.createObjectURL(image);
  
    imgPreview.src = url;
  
    imgPreview.onload = () => {
      URL.revokeObjectURL(url);
    }
  
  });
}