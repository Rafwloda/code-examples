// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';
// import Swiper styles
import 'swiper/swiper-bundle.css';

const cat = document.querySelector('.categories-component');
const catLi = document.querySelectorAll('.categories-component .product-category');
const liWrapper = document.querySelector('.categories-component .products');
const categoriesWrapper = document.querySelector('.categories-component .woocommerce');

const shopCategories = document.querySelector('.main-side-wrapper');


if (cat) {
    liWrapper.classList.add('swiper-wrapper');
    categoriesWrapper.classList.add('categories-swiper');
    const prev = document.createElement('div');
    const next = document.createElement('div');

    categoriesWrapper.appendChild(prev);
    categoriesWrapper.appendChild(next);


    prev.classList.add('swiper-button-prev');
    next.classList.add('swiper-button-next');

    catLi.forEach((item, i) => {
        const overlay = document.createElement('div');


        item.appendChild(overlay);

        item.classList.add('swiper-slide');
    });


    const swiperCat = new Swiper('.categories-swiper', {
        slidesPerView: 3.5,
        spaceBetween: 18,

        breakpoints: {
            320: {
                slidesPerView: 1.3,
                navigation: {
                    enabled: false,
                },
            },
            800: {
                slidesPerView: 2.3,

            },
            1080: {
                slidesPerView: 3.5,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            },

        }
    });
}

if (shopCategories) {
    const newElement = document.createElement('div');
    const newBar = document.createElement('div');
    const section10 = document.createElement('div');
    const sectionDiv = document.createElement('div');
    const sectionSpan = document.createElement('span');

    newElement.classList.add('main-side-arrow');
    newBar.classList.add('main-side-bar');
    section10.classList.add('section10');

    shopCategories.appendChild(newElement);
    shopCategories.appendChild(newBar);
    shopCategories.appendChild(section10);
    section10.appendChild(sectionDiv);
    sectionDiv.appendChild(sectionSpan);

    const arrowButton = document.querySelector('.main-side-arrow');
    const barButton = document.querySelector('.main-side-bar');

    arrowButton.addEventListener('click', () => {
        shopCategories.classList.toggle('arrowActive');
    })

    barButton.addEventListener('click', () => {
        shopCategories.classList.toggle('arrowActive');
    })
}
