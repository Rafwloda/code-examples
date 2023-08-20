// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.css';

const realizations = document.querySelector('.realizations__slider');

if (realizations) {
    var swiper= Swiper;
    var init = false;



    function swiperMode() {
        let mobile = window.matchMedia('(min-width: 0px) and (max-width: 600px)');
        let tablet = window.matchMedia('(min-width: 769px) and (max-width: 1024px)');
        let desktop = window.matchMedia('(min-width: 1025px)');

        if(mobile.matches) {
            if (!init) {
                init = true;
                swiper = new Swiper('.realizations__slider', {
                    slidesPerView: 1,
                    centeredSlides: true,
                    spaceBetween: 10,
                    navigation: {
                     nextEl: ".realizations__next",
                     prevEl: ".realizations__prev",
                   },

                });
            }

        }

        else if(tablet.matches) {
            swiper.destroy();
            init = false;
        }

        else if(desktop.matches) {
            swiper.destroy();
            init = false;
        }
    }

    window.addEventListener('load', function() {
        swiperMode();
    });

    window.addEventListener('resize', function() {
        swiperMode();
    });
}
