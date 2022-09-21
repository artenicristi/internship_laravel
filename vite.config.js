import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost'
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/auth.css',
                'node_modules/milligram/dist/milligram.css',
            ],
            refresh: true,
            host: 'localhost:8089'
        }),
    ],
});
