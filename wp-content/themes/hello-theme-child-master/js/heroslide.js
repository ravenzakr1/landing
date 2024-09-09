var swiper = new Swiper(".heroSwiper", {
    pagination: {
        el: ".heroSwiper .swiper-pagination",
        clickable: true,
    },
});

// img slider bottom js
var mySwiper = new Swiper(".home-img-swipper-container", {
    spaceBetween: 0,
    slidesPerView: 1.2,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        480: {
            slidesPerView: 1.3,
        },
        768: {
            slidesPerView: 2,
        },
    },
});
