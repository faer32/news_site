import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {

    let links = document.querySelectorAll('.toggle-link');
    
    let currentUrl = window.location.pathname;

    // Функция для обработки нажатия на ссылку
    function handleLinkClick(event) {
        links.forEach(link => {
            link.classList.remove('disabled');
            link.classList.remove('active');
        });
        this.classList.add('disabled');
        this.classList.add('active');
    }
    
    // Назначаем обработчик для каждой ссылки
    links.forEach(link => {

        let linkUrl = new URL(link.href).pathname;
        if (linkUrl === currentUrl) {
            link.classList.add('disabled');
            link.classList.add('active');
        }
        link.addEventListener('click', handleLinkClick);
    });
});