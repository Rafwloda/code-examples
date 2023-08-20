const revolver = document.querySelector('.rotating-circles__revolver');
const bullets = document.querySelectorAll('.rotating-circles__bullet');
let bulletID;

if (revolver) {
    setInitial();
    bullets.forEach((item, i) => {
        item.addEventListener('click', () => {
            clearActives();
            item.classList.add('rotating-circles__bullet--active');

            if (item.dataset.initialcounter == 0) {
                revolver.style.transform = 'rotate(0deg)';

                bulletsCorrection('0deg');
            } else if (item.dataset.initialcounter == 1) {
                revolver.style.transform = 'rotate(-90deg)';

                //correcting position after all item rotate
                bulletsCorrection('90deg');
            } else if (item.dataset.initialcounter == 2) {
                revolver.style.transform = 'rotate(-180deg)';

                bulletsCorrection('180deg');
            } else if (item.dataset.initialcounter == 3) {
                revolver.style.transform = 'rotate(-270deg)';

                bulletsCorrection('270deg');
            }
        });
    });


    function bulletsCorrection(deg) {
        bullets.forEach((item, i) => {
            const style = window.getComputedStyle(item);
            const matrix = new WebKitCSSMatrix(style.transform);

            if (matrix.e != 0) {
                item.style.transform = `translateX(-50%) rotate(${deg})`;
            } else if (matrix.f != 0) {
                item.style.transform = `translateY(-50%) rotate(${deg})`;
            }
        });
    }
    function clearActives() {
        bullets.forEach((item, i) => {
            item.classList.remove('rotating-circles__bullet--active');
        });
    }
    function setInitial() {
        bullets[0].classList.add('rotating-circles__bullet--active');
    }


    //pagination
    const pagRight = document.querySelector('.rotating-circles__right-pag');
    const pagLeft = document.querySelector('.rotating-circles__left-pag');

    if (pagRight) {
        let rotationValue = 0;
        let activeCounter = 0;
        let bulletRotationValue = 0;


        pagRight.addEventListener('click', ()=> {
            clearActives();



            if (rotationValue <= -270) {
                rotationValue = 0;
                bulletRotationValue = 0;
                activeCounter = 0;
            } else {
                rotationValue -= 90;
                bulletRotationValue += 90;
                activeCounter++;

                if (activeCounter > 3) {
                    activeCounter = 0;
                }
            }

            console.log('right: ' + rotationValue);
            switch (activeCounter) {
                case 0:
                    bullets[0].classList.add('rotating-circles__bullet--active');
                    break;
                case 1:
                    bullets[1].classList.add('rotating-circles__bullet--active');
                    break;
                case 2:
                    bullets[2].classList.add('rotating-circles__bullet--active');
                    break;
                case 3:
                    bullets[3].classList.add('rotating-circles__bullet--active');
                    break;
                default:

            }

            revolver.style.transform = `rotate(${rotationValue}deg)`;

            bullets.forEach((item, i) => {
                const style = window.getComputedStyle(item);
                const matrix = new WebKitCSSMatrix(style.transform);

                if (matrix.e != 0) {
                    item.style.transform = `translateX(-50%) rotate(${bulletRotationValue}deg)`;
                } else if (matrix.f != 0) {
                    item.style.transform = `translateY(-50%) rotate(${bulletRotationValue}deg)`;
                }
            });

        });
        pagLeft.addEventListener('click', ()=> {
            clearActives();


            if (rotationValue > 270) {
                rotationValue = 0;
                activeCounter = 0;
                bulletRotationValue = 0;

            } else {
                rotationValue += 90;
                activeCounter--;
                bulletRotationValue -= 90;
                if (bulletRotationValue < 0) {
                    bulletRotationValue = 270;
                }

                if (activeCounter < 0) {
                    activeCounter = 3;
                }
            }

            console.log('left: ' + rotationValue);
            switch (activeCounter) {
                case 0:
                    bullets[0].classList.add('rotating-circles__bullet--active');
                    break;
                case 1:
                    bullets[1].classList.add('rotating-circles__bullet--active');
                    break;
                case 2:
                    bullets[2].classList.add('rotating-circles__bullet--active');
                    break;
                case 3:
                    bullets[3].classList.add('rotating-circles__bullet--active');
                    break;
                default:

            }

            revolver.style.transform = `rotate(${rotationValue}deg)`;

            bullets.forEach((item, i) => {
                const style = window.getComputedStyle(item);
                const matrix = new WebKitCSSMatrix(style.transform);

                if (matrix.e != 0) {
                    item.style.transform = `translateX(-50%) rotate(${bulletRotationValue}deg)`;
                } else if (matrix.f != 0) {
                    item.style.transform = `translateY(-50%) rotate(${bulletRotationValue}deg)`;
                }
            });

        });

    }
}
