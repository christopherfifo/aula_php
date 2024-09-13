// Evita propagação nos cliques de li, a, p e ícones dentro das li
document.querySelectorAll('.sidebar_li, .sidebar_li a, .sidebar_li p, .sidebar_li i').forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.stopPropagation(); // Impede a propagação do evento para o container
    });
});

document.querySelector('.sidebar_li-contato').addEventListener('click', function(event) {
    event.stopPropagation(); // Impede a propagação do evento
    const subMenu = this.querySelector('.sidebar_contato');
    if (subMenu) {
        subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
    }
});

const sidebarContainer = document.querySelector('.sidebar_container');
const btnMenu = document.getElementById('btn_menu');

btnMenu.addEventListener('click', function(event) {
    event.stopPropagation(); // Impede a propagação do evento
    sidebarContainer.classList.toggle('active');
    if (window.innerWidth <= 1100) {
        sidebarContainer.style.width = '100svw';
    } else {
        if (sidebarContainer.classList.contains('active')) {
            sidebarContainer.style.width = '300px';
        } else {
            sidebarContainer.style.width = '90px';
        }
    }
});

sidebarContainer.addEventListener('click', function() {
    sidebarContainer.classList.remove('active');
    sidebarContainer.style.width = '90px';
});
