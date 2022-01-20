require('./bootstrap');

import Alpine from 'alpinejs';
import Echo from 'laravel-echo';

window.Alpine = Alpine;

Alpine.start();


window.Echo.private('notifications')
    .listen('UserSessionChanged', (event) => {
        let notificationElement = document.getElementById('notification');
        console.log(1);
        notificationElement.innerText = event.message;
        notificationElement.classList.remove('invisible');
        notificationElement.classList.remove('alert-success');
        notificationElement.classList.remove('alert-danger');

        notificationElement.classList.add('alert-' + event.type);
    });