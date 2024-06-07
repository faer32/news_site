import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/css/my_css.css',
                    'resources/css/my_footer_css.css',
                    'resources/css/bootstrap.min.css',
                    'resources/css/dashboard.css',
                    'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
