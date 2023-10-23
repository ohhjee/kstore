import './bootstrap';
import '../assets/css/app.css';


import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import store from './store';
import Toast from "vue-toastification"
import "vue-toastification/dist/index.css";


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .use(Toast)
            .use(ZiggyVue, Ziggy)
            .mixin({ method: { route } })
            .mount(el);
    },
    progress: false,
});

