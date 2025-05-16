import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/client.js',
                'resources/js/admin.js'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
     resolve: {
        alias: {
            '@': resolve(__dirname, 'resources/js'),
            '@client': resolve(__dirname, 'resources/js/Client'),
            '@admin': resolve(__dirname, 'resources/js/Admin'),
            // Aliases pour les composants Client
            '@/Components': resolve(__dirname, 'resources/js/Client/Components'),
            '@/Layouts': resolve(__dirname, 'resources/js/Client/Layouts'),
            '@/Pages': resolve(__dirname, 'resources/js/Client/Pages'),
            'Components': resolve(__dirname, 'resources/js/Client/Components'),
            'Layouts': resolve(__dirname, 'resources/js/Client/Layouts'),
            'Pages': resolve(__dirname, 'resources/js/Client/Pages'),
            // Aliases pour les composants Admin
            '@admin/Components': resolve(__dirname, 'resources/js/Admin/Components'),
            '@admin/Layouts': resolve(__dirname, 'resources/js/Admin/Layouts'),
            '@admin/Pages': resolve(__dirname, 'resources/js/Admin/Pages')
        },
    },
});
