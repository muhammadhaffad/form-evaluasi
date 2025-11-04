import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    build: {
        manifest: true,
        outDir: "public", // hasil build
        emptyOutDir: true,
        rollupOptions: {
            input: {
                app: "resources/js/app.js",
                style: "resources/css/app.css"
            },
        },
    },
    server: {
        watch: {
            usePolling: true,
        },
        host: true,
        port: 5173, // default vite port
    },
    plugins: [
        tailwindcss()
    ]
});
