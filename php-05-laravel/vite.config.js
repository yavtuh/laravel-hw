import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resource/js/images-preview.js',
                'resource/js/images-actions.js',
                'resource/js/product-actions.js',
                'resources/js/paypal-payments.js',
            ],
            refresh: true,
        }),
    ],
});
