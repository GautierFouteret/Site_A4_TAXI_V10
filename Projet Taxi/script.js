// Récupération des éléments du DOM
const contactForm = document.querySelector('#contact-form');
const confirmationMessage = document.querySelector('#confirmation-message');
const gallery = document.querySelector('#gallery');

// Écouteur d'événement pour le formulaire de contact
contactForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    // Simulation de l'envoi du message
    setTimeout(function() {
        contactForm.reset(); // Réinitialise le formulaire
        confirmationMessage.style.display = 'block'; // Affiche le message de confirmation
        setTimeout(function() {
            confirmationMessage.style.display = 'none'; // Cache le message de confirmation après 3 secondes
        }, 3000);
    }, 1000);
});

// Génération de la galerie de photos de la flotte de taxis
const images = ['taxi arras 1.jpg', 'taxi arras 2.jpg', 'taxi arras 3.jpg']; // Remplacez avec les noms de vos images
images.forEach(image => {
    const img = document.createElement('img');
    img.src = 'images/' + image; // Assurez-vous que le chemin d'accès est correct
    img.alt = 'Taxi';
    gallery.appendChild(img);
});

// script.js

$(document).ready(function() {
    $('#reservation-form').submit(function(event) {
        event.preventDefault();
        
        var departure = $('#departure').val();
        var arrival = $('#arrival').val();
        
        // Envoi des données à calcule_distance.php via AJAX pour obtenir la distance
        $.get('calcule_distance.php', { departure: departure, arrival: arrival }, function(distance) {
            // Calcul du tarif en fonction de la distance
            var tarif = distance * 1; // Exemple de calcul de tarif
            
            // Affichage du tarif
            $('#tarif-message').text('Le tarif de votre course est de : ' + tarif.toFixed(2) + ' euros');
        });
    });
});