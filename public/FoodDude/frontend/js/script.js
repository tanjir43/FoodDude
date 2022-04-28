$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    loop: true,
    nav: true,
    dots: true,
    autoplay: false,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,

    responsive: {
      0: {
        items: 2,

      },
      600: {
        items: 3,

      },
      1000: {
        items: 4,

        margin: 14
      },
      1100: {
        items: 4,
        dots: true,
        nav: true,

        margin: 14
      }
    }
  })
})






