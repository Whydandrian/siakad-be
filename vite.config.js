import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        manifest: 'manifest.json',
        rollupOptions: {
            output: {
                manualChunks: undefined
            }
        }
    },
    experimental: {
        renderBuiltUrl(filename, { hostType }) {
            if (hostType === 'js') {
                return { js: `/build/${filename}` }
            } else {
                return `/build/${filename}`
            }
        }
    },
    input: [
        'resources/js/toast-utility.js',
        'resources/js/login-page.js'
    ],
    refresh: true,
});