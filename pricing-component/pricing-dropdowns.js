const dropdowns = document.querySelectorAll('.pricing-dropdowns__dropdown-box');


if (dropdowns) {
    dropdowns.forEach((item, i) => {
        item.addEventListener('click', () => {
            if (item.classList.contains('pricing-dropdowns__dropdown-box--active')) {
                item.classList.remove('pricing-dropdowns__dropdown-box--active');
            } else {
                clearActives();
                item.classList.add('pricing-dropdowns__dropdown-box--active');
            }
        })
    });

    function clearActives () {
        dropdowns.forEach((item, i) => {
            item.classList.remove('pricing-dropdowns__dropdown-box--active');
        });
    }
}
