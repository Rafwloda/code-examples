document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.image-and-tabs__tab');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {


            // Dodanie klasy active do klikniętego taba
            if (this.classList.contains('image-and-tabs__tab--active')) {
                this.classList.remove('image-and-tabs__tab--active');
                // Usuwanie klasy active z wszystkich innych tabów
                tabs.forEach(function(otherTab) {
                    otherTab.classList.remove('image-and-tabs__tab--active');
                });
            } else {
                tabs.forEach(function(otherTab) {
                    otherTab.classList.remove('image-and-tabs__tab--active');
                });
                this.classList.add('image-and-tabs__tab--active');
            }
        });
    });
});
