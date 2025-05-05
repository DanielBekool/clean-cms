import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/filament/admin/theme.css'],
            refresh: true,
        }),
        tailwindcss({
            config: {
                content: [
                    './app/Filament/**/*.php',
                    './resources/views/filament/**/*.blade.php',
                    './vendor/filament/**/*.blade.php',
                    './vendor/awcodes/filament-curator/resources/**/*.blade.php',
                    './resources/css/filament/admin/curator.css',
                ],
                safelist: [
                    'curator-grid-container',
                    'checkered',
                    'fi-resource-media',
                    'curator-panel-sidebar',
                    'curator-panel',
                    'curator-picker-grid',
                    {
                        pattern: /^curator-/,
                        variants: ['hover', 'focus', 'focus-within', 'group-hover', 'dark'],
                    },
                    {
                        pattern: /^fi-/,
                        variants: ['hover', 'focus', 'focus-within', 'group-hover', 'dark'],
                    },
                ],
            },
        }),
    ],
});
