// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.css';

const latest = document.querySelector('.new-products');


if (latest) {

    const swiperNew = new Swiper('.new-products__additional-wrapper', {
        slidesPerView: 3.5,
        spaceBetween: 20,
        // centeredSlides: true,
        breakpoints: {
            100: {
                slidesPerView: 1.5,
            },
            800: {
                enabled: true,
            },
            1080: {
                enabled: false,
            },
        }
    });
}
