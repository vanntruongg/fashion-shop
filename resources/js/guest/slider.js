const dataSlide = [
  {
    imgSrc: '/storage/images/slide/slide1.jpg'
  },
  {
    imgSrc: '/storage/images/slide/slider3.jpg'
  }
]
const slider = document.getElementById('slider');
if(slider) {
  slider.innerHTML = dataSlide.map(slide => {
    return `<div draggable="true" class="outline-none">
              <img src="${slide.imgSrc}" alt="slider" lazyload="true" class="w-full">
            </div>`;
  }).join('');
}
$('#slider').slick({
  // dots: true,
  infinite: true,
  fade: true,
  autoplay: true,
  autoplaySpeed: 3000,
  cssEase: 'linear',
  draggable: true,
  prevArrow:"<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow:"<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
});