// script.js

document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('nav ul li a');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1); // Récupère l'ID de la section cible
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                // Faire défiler jusqu'à la section cible
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
