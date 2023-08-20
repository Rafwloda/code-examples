const hamburger = document.querySelector('.header__hamburger');
const sideMenu = document.querySelector('.header__side-menu');
const header = document.querySelector('.header');
const liElements = document.querySelectorAll('.header__mobile-wrapper li');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('opened');
        sideMenu.classList.toggle('header__side-menu--opened');
        header.classList.toggle('header--opened');
        hamburger.setAttribute('aria-expanded', hamburger.classList.contains('opened'));

        if (header.classList.contains('header--opened')) {
          document.body.style.overflowY = 'hidden';
          liElements.forEach((li, index) => {
            setTimeout(() => {
                li.style.opacity = 1;
                li.style.transform = 'translateX(0)';
            }, index * 50);
          });
        } else {
          document.body.style.overflowY = 'auto';
          liElements.forEach((li) => {
            setTimeout(() => {
                li.style.opacity = 0;
                li.style.transform = 'translateX(-20px)';
            }, 50);
          });
        }
    });
}
