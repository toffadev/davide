import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { route } from 'ziggy-js';

createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Admin/Pages/${name}.vue`, import.meta.glob('./Admin/Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.config.globalProperties.$route = route;
    app.use(plugin);
    return app.mount(el);
  },
}); 