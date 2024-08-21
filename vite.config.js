import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','public/css/bootstrap.css','public/css/style.css',
                'public/css/nice-select.css', 'public/css/meanmenu.css', 'public/css/animate.css','public/css/owl-carousel.css',
                'public/css/swiper-bundle.css','public/css/backtotop.css', 'public/css/magnific-popup.css', 'public/css/nice-select.css',
                'public/flaticon/flaticon.css', 'public/css/font-awesome-pro.css','public/css/default.css','public/flaticon/flaticon.css',
                'modules/TaskModule/resources/js/gender-register.js',
                'modules/TaskModule/resources/js/task-loads.js',
                'modules/TaskModule/resources/css/styles.css'
            ],
            refresh: true,
        }),
    ],
});
