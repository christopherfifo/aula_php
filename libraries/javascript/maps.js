// Função para iniciar o Google Maps
function initMap() {
    var clinicLocation = { lat: -23.550520, lng: -46.633308 }; // Exemplo de coordenadas
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: clinicLocation,
    });
    var marker = new google.maps.Marker({
        position: clinicLocation,
        map: map,
        title: 'Nossa Clínica',
    });
}

// Função para controlar a galeria de fotos
let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.gallery-images img');
    if (index >= slides.length) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = slides.length - 1;
    } else {
        currentIndex = index;
    }
    const offset = -currentIndex * 100;
    document.querySelector('.gallery-images').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

// Carregar o Google Maps API
function loadGoogleMapsScript() {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap`;
    script.async = true;
    document.head.appendChild(script);
}

document.addEventListener('DOMContentLoaded', function() {
    loadGoogleMapsScript();
});