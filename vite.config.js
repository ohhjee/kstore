import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    // server: {
    //     hmr: {
    //         host: "192.168.157.90",
    //     },
    // },
    plugins: [
        laravel({
            input: [
                "resources/js/app.ts",
                "resources/css/app.css",

                "resources/assets/css/style.min.css",
            ],
            ssr: "resources/js/ssr.ts",
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
});
