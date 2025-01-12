import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

new Swiper('.swiper-container', {
    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
    },
    speed: 2000,
    spaceBetween: 20,
});

window.Alpine = Alpine;

Alpine.start();
